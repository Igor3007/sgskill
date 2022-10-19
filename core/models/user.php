<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/db.php');

function getUserData($email){
    global $id_db;

    $sql = "SELECT *
            FROM `sll_users`
            WHERE `email` = '$email' 
     ";

    $query = mysqli_query($id_db, $sql) or die('error getUserData:'.mysqli_error($id_db));

    return $query ? mysqli_fetch_assoc($query) : false;
}


function setUserData($params, $id){
    return mysql_update_array('sll_users', $params, $id);

}



?>