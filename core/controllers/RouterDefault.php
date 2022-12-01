<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/pages.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/controllers/helpers/_editorPost.php');


$pageID = htmlspecialchars($route[0]);
$data = getPageData([
    'alias' => $pageID,
    'status' => '1'
]);



if (isset($data['alias'])) {

    //add hits
    mysql_counter('sll_pages', 'hits', ['alias' => $pageID]);

    $PAGE['TEMPLATE'] = 'page';
    $PAGE['SCRIPTS'][] = '/js/main.js';
    $PAGE['STYLES'][] = '/styles/common-site.css';
    $PAGE['SEO_TITLE'] = ($data['seo_title'] ? $data['seo_title'] : $data['title']);
    $PAGE['SEO_DESC']  = $data['seo_desc'];
    $PAGE['SEO_KEY']   = $data['seo_keywords'];
    $PAGE['h1'] = $data['title'];

    $postContent = json_decode($data['content'], true);
} else {

    $PAGE['TEMPLATE'] = 'blog';
    $PAGE['SCRIPTS'][] = '/js/main.js';

    require_once('Blog.php');
}
