<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/user.php');


$dataUser = getUserData($_SESSION['user']['email']);

 

?>