<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/inc/config.php');

function getUserCourses($ids){

    /* ids = '1,2' */

    global $id_db;

    $sql = "SELECT *
    FROM `sll_courses`
    WHERE `id` IN ($ids)
    
    ";

     

$query = mysqli_query($id_db, $sql) or die('error getUserCourses:'.mysqli_error($id_db));

return $query ? mysqli_fetch_all($query, MYSQLI_ASSOC) : false;
}


?>