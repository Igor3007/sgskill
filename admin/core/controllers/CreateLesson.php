<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
 

$post = $_POST;

//name
if(empty($post['name'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Название урока не может быть пустым'
    ]));
}

 



$params = [
    'course_id' => $post['course_id'], 
    'name' => $post['name'], 
    'length' => $post['length'], 
    'status' => $post['status'], 
    'stop' => $post['stop'], 

];

//image
if($_FILES['image']['size']){
    $saveFile = uploadFile($_FILES['image']);

    if($saveFile['status']){
        $params['preview'] = $saveFile['id'];
    }
}

$query = createLesson($params);

//var_dump($query);

if($query['status']){
    exit(json_encode([
        'status' => true,
        'msg' => 'Новый урок добавлен!'
    ]));
}else{
    exit(json_encode([
        'status' => false,
        'msg' => 'Ошибка соединения с базой '.$query['err']
    ]));
}

exit();

?>