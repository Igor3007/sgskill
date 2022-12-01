<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/pages.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/controllers/helpers/_editorPost.php');


$pageID = htmlspecialchars($route[1]);

$data = getPageData([
    'alias' => $pageID
]);

$PAGE['h1'] = $data['title'];



$postContent = json_decode($data['content'], true);
