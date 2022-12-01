<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/pages.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/core/controllers/_editorHelpers.php');


$post_id = $_GET['id'];
$data = getPageData(['id' => $post_id]);



if (!$data['id']) {
    header('location: /admin/cp.php?view=pages-list');
}
