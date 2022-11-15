<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');

$course_id = $route[2][0];
$lessonData = [];

$lessons = getLessonList($course_id);
$course = getUserCourses($course_id);

$courseData = getCourseData($course_id); 
$allLesson = getLessonListAll();
$lessonProps = getLessonPropsAll($course_id, $_SESSION['user']['id']);
$lineupArray = json_decode($courseData['lineup'], true);


/* ========================================
если первый раз польз-ль открыл курс
========================================*/

if(!$lessonProps){

    //массив уроков без глав
    $clearArray = [];

    foreach($lineupArray as $item){
        if($item['id']){
            $clearArray[] = $item;
        }
    }

   // debug($clearArray);

    $insertStart = mysql_insert_array('sll_lesson-props', [
        'state' => 'active',
        'lesson_id' => 14,
        'user_id'   => $_SESSION['user']['id'],
        'course_id' => $course_id
    ]);
}

/* ========================================
обеъедть лайнап с уроком
========================================*/


foreach($allLesson as $item){
    $lessonData[$item['id']] = $item;
    $lessonData[$item['id']]['props'] = ($lessonProps[$item['id']] ? $lessonProps[$item['id']] : false);
}

//debug($lessonData);

function getLessonStatus($lessonArray){

    $DATE_LINK = new DateTime($lessonArray['props']['date_start']);
    $DATE_LINK->add(new DateInterval('P7D'));
    $DATE__CURRENT = new DateTime('NOW');//

    if(!$lessonArray['props']) {
        return 'locked';
    }

    if($lessonArray['props']['state'] == 'completed') {
      

        if($DATE__CURRENT->getTimestamp() > $DATE_LINK->getTimestamp()) {
            return 'passed';
        }else{
            return 'completed';
        }

    }
}
 

$PAGE['h1'] = $course[0]['name'];
$PAGE['desc'] = $course[0]['preview_text'];
$PAGE['BREADCRUMBS']['/user/cours/'.$course[0]['id']] = $course[0]['name'];


?>