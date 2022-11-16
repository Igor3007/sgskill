<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/db.php');

function getUserCourses($ids){

    /* ids = '1,2' */

    global $id_db;

    $sql = "SELECT * FROM `sll_courses` WHERE `id` IN ($ids)";
    $query = mysqli_query($id_db, $sql) or die('error getUserCourses:'.mysqli_error($id_db));

    return $query ? mysqli_fetch_all($query, MYSQLI_ASSOC) : false;
}

function getAllCourses(){

    /* ids = '1,2' */

    global $id_db;

    $sql = "SELECT * FROM `sll_courses` ";
    $query = mysqli_query($id_db, $sql) or die('error getAllCourses:'.mysqli_error($id_db));

    return $query ? mysqli_fetch_all($query, MYSQLI_ASSOC) : false;
}

function getCourseData($id){

    /* ids = '1,2' */

    global $id_db;

    $sql = "SELECT * FROM `sll_courses` WHERE `id` = '$id'  ";
    $query = mysqli_query($id_db, $sql) or die('error getCourseData:'.mysqli_error($id_db));

    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}

function createCourse($params){
    return mysql_insert_array('sll_courses', $params);
}

function setCourseData($params, $id){
    return mysql_update_array('sll_courses', $params, $id);
}


?>