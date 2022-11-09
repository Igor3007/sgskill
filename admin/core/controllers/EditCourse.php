<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');
 
$courseData = getCourseData($_GET['id']);

if(!$courseData['id']){
    header('location: /admin/cp.php?view=course-list');
}

?>