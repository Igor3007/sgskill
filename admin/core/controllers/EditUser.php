<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');

$allCourses = getAllCourses();

$userData = getCourseDataID($_GET['id']);

$userCourseId = explode(',', $userData['courses']);

if(!$userData['id']){
    header('location: /admin/cp.php?view=user-list');
}

?>

