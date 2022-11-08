<?php

$hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "sgskills";

// $hostname = "localhost";
// $db_username = "sogood_skill";
// $db_password = "7&p&ZQOJ";
// $db_name = "sogood_skill";



$id_db = mysqli_connect($hostname, $db_username, $db_password, $db_name);
         mysqli_set_charset($id_db, 'UTF8');
        
        if(mysqli_connect_errno()){
            printf("Failed connect database: %s\n",  mysqli_connect_error());
}

?>