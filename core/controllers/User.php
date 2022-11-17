<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/user.php');

$user = is_user();

$user['photo'] = getMediaURL($user['photo'])['orig'];

if(!$user['login']){
    header('location:/login/');
    exit();
}

function getStateAccessCourse ($props){

    //если админ
    if($_SESSION['user']['access'] > 1){
        return 'permanent';
    }

    if($props['start'] && !$props['end']){
        $DATE_START = new DateTime($props['start']);
        $DATE__CURRENT = new DateTime('NOW'); 

        return ($DATE__CURRENT->getTimestamp() > $DATE_START->getTimestamp());
    }

    if(!$props['start'] && $props['end']){
        $DATE_END   = new DateTime($props['end']);
        $DATE__CURRENT = new DateTime('NOW'); 

        return ($DATE__CURRENT->getTimestamp() < $DATE_END->getTimestamp());
    }

    if(!$props['start'] && !$props['end']){
        return 'permanent';
    }

    $DATE_START = new DateTime($props['start']);
    $DATE_END   = new DateTime($props['end']);
    $DATE__CURRENT = new DateTime('NOW'); 
    
    return ($DATE__CURRENT->getTimestamp() > $DATE_START->getTimestamp() && $DATE__CURRENT->getTimestamp() < $DATE_END->getTimestamp());
}

if($user['courses'] && $user['access'] < 3){
    $courses = getUserCourses($user['courses']);
    $userData = getUserDataID($_SESSION['user']['id']);

    $userCourseProps = [];

    foreach(json_decode($userData['props'], true) as $item){ 
        $userCourseProps[$item['id']] = $item;
    }

}else{
    //если админ до видны все курсы
    $courses = getAllCourses();
}

 


 

?>