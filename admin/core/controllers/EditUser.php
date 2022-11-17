<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');

$user_id = $_GET['id'];

$allCourses = getAllCourses();
$userData = getUserDataID($user_id);
$userCourseId = explode(',', $userData['courses']);
$userCourseProps = [];

foreach(json_decode($userData['props'], true) as $item){ 
    $userCourseProps[$item['id']] = $item;
}

if(!$userData['id']){
    header('location: /admin/cp.php?view=user-list');
}

?>

