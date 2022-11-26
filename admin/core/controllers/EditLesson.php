<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/media.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/core/controllers/_editorHelpers.php');

 
$lessonData = getLessonData($_GET['id']);
$allCourses = getAllCourses();

if(!$lessonData['id']){
    header('location: /admin/cp.php?view=lesson-list');
}

$arraySelect  = [];

foreach($allCourses as $item) {
    $arraySelect[ $item['id'] ] = $item['name'];
}
