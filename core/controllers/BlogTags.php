<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/blog.php');

$tagID = urldecode($route[2][0]);
$page = urldecode($route[2][2]);

$PAGE['SEO_TITLE'] = '#' . $tagID . ' - Посты - sg-skill';



$query = getListArticle(
    array(
        'link' => 'tag/' . $tagID . '/',
        'page' => $page,
        'count' => 5,
        'where' => "tags LIKE '%$tagID%'"
    )
);

$allArticle = $query['query'];
