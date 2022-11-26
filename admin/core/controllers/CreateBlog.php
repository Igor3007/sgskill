<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/blog.php');

 

$arraySelect  = [];

foreach(getAllCategories(false) as $item) {
    $arraySelect[ $item['id'] ] = $item['name'];
}
?>