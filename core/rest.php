<?php


switch($route[1]){

    case 'auth': 
        require_once('controllers/Auth.php');
    break;
    
    case 'userUpdate': 
        require_once('controllers/UserUpdate.php');
    break;

    case 'taskReply': 
        require_once('controllers/TaskReply.php');
    break;

}



?>