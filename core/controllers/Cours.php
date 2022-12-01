<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/courses.php');

$course_id = $route[2][0];
$lessonData = [];

$lessons = getLessonList($course_id);
$course = getUserCourses($course_id);

$courseData = getCourseData($course_id);
$allLesson = getLessonListAllUnlock();
$lessonProps = getLessonPropsAll($course_id, $_SESSION['user']['id']);
$lineupArray = json_decode($courseData['lineup'], true);


/* ========================================
если первый раз польз-ль открыл курс
========================================*/

if (!$lessonProps && $lineupArray) {

    //массив уроков без глав
    $clearArray = [];

    foreach ($lineupArray as $item) {
        if ($item['id']) {
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
объеденить лайнап с уроком
========================================*/


foreach ($allLesson as $item) {
    $lessonData[$item['id']] = $item;
    $lessonData[$item['id']]['props'] = ($lessonProps[$item['id']] ? $lessonProps[$item['id']] : false);
}

//debug($lessonData);

function getLessonStatus($lessonArray)
{

    if ($_SESSION['user']['access'] > 1) {
        return 'active';
    }

    $DATE_LINK = new DateTime($lessonArray['props']['date_start']);
    $DATE_LINK->add(new DateInterval('P7D'));
    $DATE__CURRENT = new DateTime('NOW'); //

    if (!$lessonArray['props']) {
        return 'locked';
    }

    if ($lessonArray['props']['state'] == 'completed') {


        if ($DATE__CURRENT->getTimestamp() > $DATE_LINK->getTimestamp()) {
            return 'passed';
        } else {
            return 'completed';
        }
    }
}

/* =====================================
проверить доступ курса по дате
===================================== */

$userData = getUserDataID($_SESSION['user']['id']);

$userCourseProps = [];

foreach (json_decode($userData['props'], true) as $item) {
    $userCourseProps[$item['id']] = $item;
}


if (!getStateAccessCourse($userCourseProps[$course_id])) {
    exit('Курс закончился или еще не начинался');
}



$PAGE['h1'] = $course[0]['name'];
$PAGE['desc'] = nl2br($course[0]['preview_text']);
$PAGE['BREADCRUMBS']['/user/cours/' . $course[0]['id']] = $course[0]['name'];
