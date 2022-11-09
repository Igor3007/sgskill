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

//name
if(empty($post['course_id'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Необходимо выбрать курс'
    ]));
}

 



$params = [
    'course_id' => $post['course_id'], 
    'name' => $post['name'], 
    'length' => $post['length'], 
    'status' => $post['status'], 
    'stop' => $post['stop'], 
    'content' => addslashes($post['content']), 

];

//image
if($_FILES['image']['size']){
    $saveFile = uploadFile([
        'file' => $_FILES['image']
    ]);

    if($saveFile['status']){
        $params['preview'] = $saveFile['id'];
    }
}

if($post['post_id']) {
    $query = setLessonData($params, array( 'id' => $post['post_id'] ));

    if($query['status']){
        exit(json_encode([
            'status' => true,
            'msg' => 'Сохранено!'
        ]));
    }

}else{
    $query = createLesson($params);

    if($query['status']){
        exit(json_encode([
            'status' => true,
            'msg' => 'Новый урок добавлен!'
        ]));
    }
}



//var_dump($query);

if(!$query['status']){
    exit(json_encode([
        'status' => false,
        'msg' => 'Ошибка соединения с базой '.$query['err']
    ]));
}

exit();

?>