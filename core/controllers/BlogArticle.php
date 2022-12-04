<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/controllers/helpers/_editorPost.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/comment.php');


$post_alias = htmlspecialchars($route[2][0]);

$data = getArticleData(
    ['alias' => $post_alias]
);

$comments = getAllComments([
    'post_id' => $data['id'],
    'status' => 1
]);

$postContent = json_decode($data['content'], true);
