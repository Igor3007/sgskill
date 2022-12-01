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

function getLessonListAll(){
    global $id_db;

    $sql = "SELECT *
            FROM `sll_lesson`
     ";

    $query = mysqli_query($id_db, $sql) or die('error getLessonListAll:'.mysqli_error($id_db));

    return $query ? mysqli_fetch_all($query, MYSQLI_ASSOC) : false;
}

function getLessonListAllUnlock(){
    global $id_db;

    $sql = "SELECT *
            FROM `sll_lesson`
            WHERE `status` = 1
     ";

    $query = mysqli_query($id_db, $sql) or die('error getLessonListAll:'.mysqli_error($id_db));

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

function getLessonProps($lesson_id, $user_id){
    global $id_db;

    $sql = "SELECT *
            FROM `sll_lesson-props`
            WHERE `lesson_id` = '$lesson_id' AND `user_id` = '$user_id' 
     ";

    $query = mysqli_query($id_db, $sql) or die('error getLessonProps:'.mysqli_error($id_db));

    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}

function getLessonPropsAll($course_id, $user_id){
    global $id_db;

    $sql = "SELECT *
            FROM `sll_lesson-props`
            WHERE `user_id` = '$user_id' AND `course_id` = '$course_id'
     ";

    $query = mysqli_query($id_db, $sql) or die('error getLessonProps:'.mysqli_error($id_db));

    $resultArray = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $keyArray = [];

    if(count($resultArray)){

        foreach ($resultArray as $item) {
            $keyArray[$item['lesson_id']] = $item;
        }

        return $keyArray;

    }else{
        return false;
    }

     
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

 
function createLesson($params){
    return mysql_insert_array('sll_lesson', $params);
}


function setLessonData($params, $id){
    return mysql_update_array('sll_lesson', $params, $id);
}

function getNextLesson($lesson_id){

    //данные урока
    $lesson = getLessonData($lesson_id);
    $lesson_current = 1;
    $lesson_total = 1;

    //по курс-ид урока получаем весь массив уроков курса
    $courseData = getCourseData($lesson['course_id']);
    $lineupArray = json_decode($courseData['lineup'], true);

    // преобразуем в ассоц с ключами урок-ид, и удаляем заголовки
    $lessonData = array();

    foreach($lineupArray as $item){
        if($item['id']){
            $lessonData[$item['id']] = $item;

            if($lesson_id == $item['id']) {
                $lesson_current = $lesson_total;
            }

            $lesson_total++;
        }
    }

    //находим в массиве текущий и след
    //если нет след то вернет false

    while ($key = key($lessonData) !== null) {

        $current = current($lessonData);
        $nextValue = next($lessonData);
    
        if($current['id'] == $lesson_id){

            return [
                'current' => [
                    'props' => $current,
                    'data'  => getLessonData($current['id'])
                ],
                'next' => [
                    'props' => $nextValue,
                    'data'  => getLessonData($nextValue['id'])
                ],
                'details' => [
                    'number' => $lesson_current,
                    'total' => $lesson_total
                ]
            ];
             
            break;
        }
    
        
    }


}
