<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');

$lessons = getLessonList($route[2][0]);
$course = getUserCourses($route[2][0]);

$courseData = getCourseData($route[2][0]); 

$lineupArray = json_decode($courseData['lineup'], true);

$allLesson = getLessonListAll();

$lessonData = [];

foreach($allLesson as $item){
    $lessonData[$item['id']] = $item;
}


$PAGE['h1'] = $course[0]['name'];
$PAGE['desc'] = $course[0]['preview_text'];
$PAGE['BREADCRUMBS']['/user/cours/'.$course[0]['id']] = $course[0]['name'];

?>