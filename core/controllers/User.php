<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');

$user = is_user();

$user['photo'] = getMediaURL($user['photo'])['orig'];

if(!$user['login']){
    header('location:/login/');
    exit();
}

if($user['courses'] && $user['access'] < 3){
    $courses = getUserCourses($user['courses']);
}else{

    //если админ до видны все курсы

    $courses = getAllCourses();
}



 

?>