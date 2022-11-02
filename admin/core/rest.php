
<?php



switch($_GET['method']){

    case 'createUser': 
        require_once('controllers/CreateUser.php');
    break;
    
    case 'createCourse': 
        require_once('controllers/CreateCourse.php');
    break;

    case 'createLesson': 
        require_once('controllers/CreateLesson.php');
    break;
    
     
}



?>