<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');
 

$post = $_POST;

//name
if(empty($post['name'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Название курса не может быть пустым'
    ]));
}


$params = [
    'name' => $post['name'],
    'preview_text' => $post['preview_text'],
    'date_finish' => $post['date_finish'],
    'date_start' => $post['date_start'],
];

 

//image
if($_FILES['image']['size']){
    
    $saveFile = uploadFile([
        'file' => $_FILES['image']
    ]);

    if($saveFile['status']){
        $params['image'] = $saveFile['id'];
    }
}

$query = createCourse($params);

//var_dump($query);

if($query['status']){
    exit(json_encode([
        'status' => true,
        'msg' => 'Новый курс добавлен !'
    ]));
}else{
    exit(json_encode([
        'status' => false,
        'msg' => 'Ошибка соединения с базой '.$query['err']
    ]));
}

exit();

?>