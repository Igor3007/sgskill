<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/blog.php');

$id_cat = htmlspecialchars($route[2][0]);
$page = urldecode($route[2][2]);



$query = getListArticle(
    array(
        'link' => 'category/' . $id_cat . '/',
        'page' => $page,
        'count' => 5,
        'where' => "category = '$id_cat' AND status = 1"
    )
);

$allArticle = $query['query'];
