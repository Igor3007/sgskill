<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/core/app.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/inc/config.php');
require_once('core/router.php');
require_once('view/layouts/'.$PAGE['LAYOUT'].'.php');

if($_SESSION['user']['access'] != 3) {
    header('location: /');
}

?>