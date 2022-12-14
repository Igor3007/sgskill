<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/db.php');

function getAllPages($where)
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

    $sql = "SELECT *  FROM `sll_pages`  " . ($where ? 'WHERE ' . $params_where : '');

    $query = mysqli_query($id_db, $sql) or die('error getAllArticle:' . mysqli_error($id_db));
    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}


function getPageData($where)
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

    $sql = "SELECT * FROM `sll_pages` " . ($where ? 'WHERE ' . $params_where : '');


    $query = mysqli_query($id_db, $sql) or die('error getArticleData:' . mysqli_error($id_db));

    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}
