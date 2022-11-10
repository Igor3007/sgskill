
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

    case 'uploadEditor': 
        require_once('controllers/UploadEditor.php');
    break;

    case 'remove': 
        require_once('controllers/Remove.php');
    break;

    case 'getLessons': 
        require_once('controllers/_popupGetLessons.php');
    break;
    
     
}



?>