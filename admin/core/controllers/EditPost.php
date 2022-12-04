<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/blog.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/comment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/core/controllers/_editorHelpers.php');


$post_id = $_GET['id'];
$data = getArticleData(['id' => $post_id]);

$comments = getAllComments([
    'post_id' => $post_id
]);



if (!$data['id']) {
    header('location: /admin/cp.php?view=blog-list');
}

$arraySelect  = [];



foreach (getAllCategories(false) as $item) {
    $arraySelect[$item['id']] = $item['name'];
}
