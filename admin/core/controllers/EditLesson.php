<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/media.php');

 
$lessonData = getLessonData($_GET['id']);



?>