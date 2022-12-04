<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/db.php');

function getAllComments($where)
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

    $sql = "SELECT *  FROM `sll_comments`  " . ($where ? 'WHERE ' . $params_where : '');

    $query = mysqli_query($id_db, $sql) or die('error getAllComments:' . mysqli_error($id_db));
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}


function getCommentData($where)
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

    $sql = "SELECT * FROM `sll_comments` " . ($where ? 'WHERE ' . $params_where : '');
    $query = mysqli_query($id_db, $sql) or die('error getCommentData:' . mysqli_error($id_db));

    return mysqli_fetch_assoc($query);
}
