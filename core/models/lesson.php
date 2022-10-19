<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/db.php');

 

function getLessonList($id_course){
    global $id_db;

    $sql = "SELECT *
            FROM `sll_lesson`
            WHERE `course_id` = '$id_course' 
     ";

    $query = mysqli_query($id_db, $sql) or die('error getLessonList:'.mysqli_error($id_db));

    return $query ? mysqli_fetch_all($query, MYSQLI_ASSOC) : false;
}

function getLessonData($id){
    global $id_db;

    $sql = "SELECT *
            FROM `sll_lesson`
            WHERE `id` = '$id' 
     ";

    $query = mysqli_query($id_db, $sql) or die('error getLessonData:'.mysqli_error($id_db));

    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}

function setTaskReply($data){


    $params = [
        'text' => $data['text'],
        'lesson_id' => $data['lesson_id'],
        'user_id' => $data['user_id'],
    ];

    $query = mysql_insert_array('sll_task_reply', $params);

    if($query){
        return [
            'status' => true,
            'id' => $query['mysql_insert_id']
        ];
    }else{
        return [
            'status' => false,
        ];
    }

}

function getTaskReplyData($lesson_id, $user_id){


    global $id_db;

    $sql = "SELECT *
            FROM `sll_task_reply`
            WHERE `lesson_id` = '$lesson_id' AND `user_id` = $user_id
     ";

    $query = mysqli_query($id_db, $sql) or die('error getTaskReplyData:'.mysqli_error($id_db));

    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}



?>