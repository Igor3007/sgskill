<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');

if(empty($_POST['text'])){
    exit(json_encode([
        'status' => false,
        'msg' => 'Пустой ответ не допустим'
    ]));
}

$setReply = setTaskReply([
    'text' => $_POST['text'],
    'user_id' => $_SESSION['user']['id'],
    'lesson_id' => $_POST['lesson_id'],
]);

if($setReply) {
    exit(json_encode([
        'status' => true,
        'msg' => 'save'
    ]));
}




?>