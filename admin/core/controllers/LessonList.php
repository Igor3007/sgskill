<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');

$allCourses = getAllCourses();
$allLesson = getLessonListAll();

?>