<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/controllers/helpers/_editorPost.php');


$post_alias = htmlspecialchars($route[2][0]);

$data = getArticleData(
    ['alias' => $post_alias]
);

$postContent = json_decode($data['content'], true);
