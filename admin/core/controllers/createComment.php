<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/db.php');

$post = $_POST;

//name
if (empty($post['name'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Имя не может быть пустым'
    ]));
}

$params = [

    'name' => $post['name'],
    'post_id' => $post['post_id'],
    'status' => $post['status'],
    'link' => $post['link'],
    'text' => $post['text'],
    'date_create' => $post['date_create'],

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

if ($post['comment_id']) {


    $query = mysql_update_array('sll_comments', $params, ['id' => $post['comment_id']]);


    if ($query['status']) {
        exit(json_encode([
            'status' => true,
            'msg' => 'Сохранено!'
        ]));
    }
} else {


    $query = mysql_insert_array('sll_comments', $params);

    if ($query['status']) {
        exit(json_encode([
            'status' => true,
            'msg' => 'Новый коментарий добавлен'
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
