<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/blog.php');

$id_cat = htmlspecialchars($route[2][0]);

if ($id_cat == 'new') {
    $params = false;
} else {
    $params = [
        'status' => '1',
        'category' => $id_cat
    ];
}

$allArticle = getAllArticle($params);
