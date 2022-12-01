<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/blog.php');

$allCategories = getAllCategories([
    'cat_status' => '1'
]);


$page = urldecode($route[2][0]);



$query = getListArticle(
    array(
        'link' => '',
        'page' => $page,
        'count' => 5,
        'where' => "status = 1"
    )
);

$allArticle = $query['query'];
