<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/db.php');

function getAllArticle($where)
{
    global $id_db;

    $params_query = '';
    $params_where = false;

    if ($where) {
        foreach ($where as $key => $value) {
            if (!$params_where) {
                $params_where .= '`' . $key . '`=\'' . $value . '\'';
            } else {
                $params_where .= ' AND `' . $key . '`=\'' . $value . '\'';
            }
        }
    }

    $sql = "SELECT blog.*, category.name, category.cat_status  FROM `sll_blog` AS blog LEFT JOIN `sll_blog-categories` AS category ON blog.category = category.id " . ($where ? 'WHERE ' . $params_where : '');

    $query = mysqli_query($id_db, $sql) or die('error getAllArticle:' . mysqli_error($id_db));
    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}

function getArticleData($where)
{
    global $id_db;

    $params_query = '';
    $params_where = false;

    if ($where) {
        foreach ($where as $key => $value) {
            if (!$params_where) {
                $params_where .= '`' . $key . '`=\'' . $value . '\'';
            } else {
                $params_where .= ' AND `' . $key . '`=\'' . $value . '\'';
            }
        }
    }

    $sql = "SELECT * FROM `sll_blog` " . ($where ? 'WHERE ' . $params_where : '');


    $query = mysqli_query($id_db, $sql) or die('error getArticleData:' . mysqli_error($id_db));

    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}


function getAllCategories($where)
{
    global $id_db;

    $params_query = '';
    $params_where = false;

    if ($where) {
        foreach ($where as $key => $value) {
            if (!$params_where) {
                $params_where .= '`' . $key . '`=\'' . $value . '\'';
            } else {
                $params_where .= ' AND `' . $key . '`=\'' . $value . '\'';
            }
        }
    }

    $sql = "SELECT * FROM `sll_blog-categories` " . ($where ? 'WHERE ' . $params_where : '');

    $query = mysqli_query($id_db, $sql) or die('error getAllCategories:' . mysqli_error($id_db));
    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}
