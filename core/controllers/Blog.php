<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/blog.php');

$allCategories = getAllCategories([
    'cat_status' => '1'
]);

$allArticle = getAllArticle([
    'status' => '1'
]);
