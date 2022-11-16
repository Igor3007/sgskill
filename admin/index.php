<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/core/app.php');

if($_SESSION['user']['access'] == 3) {
    exit(header('location: ./cp.php'));
}

header('location: /');


?>