<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/blog.php');


$post = $_POST;

//name
if (empty($post['title'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Заголовок не может быть пустым'
    ]));
}

//name
if (empty($post['category'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Необходимо выбрать категорию'
    ]));
}


function getAlias($s)
{
    $s = (string) $s;
    $s = strip_tags($s);
    $s = str_replace(array("\n", "\r"), " ", $s);
    $s = preg_replace("/\s+/", ' ', $s);
    $s = trim($s);
    $s = mb_convert_case($s, MB_CASE_LOWER, 'UTF-8');
    $s = strtr($s, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
    $s = str_replace(" ", "-", $s);
    return $s;
}


$params = [

    'title' => $post['title'],
    'category' => $post['category'],
    'status' => $post['status'],
    'date_create' => $post['date_create'],
    'tags' => $post['tags'],
    'pretext' => $post['pretext'],
    'seo_title' => $post['seo_title'],
    'seo_desc' => $post['seo_desc'],
    'seo_keywords' => $post['seo_keywords'],

    'content' => addslashes($post['content']),


];

//image
if ($_FILES['image']['size']) {
    $saveFile = uploadFile([
        'file' => $_FILES['image']
    ]);

    if ($saveFile['status']) {
        $params['image'] = $saveFile['id'];
    }
}



if ($post['post_id']) {

    $query = mysql_update_array('sll_blog', $params, ['id' => $post['post_id']]);


    if ($query['status']) {
        exit(json_encode([
            'status' => true,
            'msg' => 'Сохранено!'
        ]));
    }
} else {

    $params['alias'] = getAlias($post['title']);

    $query = mysql_insert_array('sll_blog', $params);

    if ($query['status']) {
        exit(json_encode([
            'status' => true,
            'msg' => 'Новый пост добавлен!'
        ]));
    }
}



//var_dump($query);

if (!$query['status']) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Ошибка соединения с базой ' . $query['err']
    ]));
}

exit();
