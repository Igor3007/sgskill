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





function getListArticle($params)
{
    global $id_db;

    if ($params['where']) $WHERE = "WHERE " . $params['where'];

    $countItem = mysqli_query($id_db, "SELECT COUNT(*) FROM `sll_blog` $WHERE");
    $countItem = mysqli_fetch_assoc($countItem);
    $params['itemCount'] = $countItem['COUNT(*)']; // общее количество строк в базе


    if (empty($params['page']) or !$params['page']) { // если не задана страница 
        $start = 0;
        $end = $params['count'];        //выбираем с 1 по $count записи
        $params['page'] = 1;
    } else {
        $start = ($params['count'] * $params['page']) - $params['count'];
        $start = ($start < 0 ? 0 : $start);
        $end = $params['count'];
    }

    $max_count_page = ceil($params['itemCount'] / $params['count']);

    //if($params['page'] && $params['page'] > $max_count_page){ header('location:/'); } // если ктототвручную вобьет неверный номер стр

    if ($params['page'] == 1) {
        $page_button['next']  = $params['page'] + 1;
    } else {
        $page_button['next']  = $params['page'] + 1;
        $page_button['prev']  = $params['page'] - 1;
    }

    //exit($params['itemCount']);

    if ($params['page'] >= $max_count_page) {
        unset($page_button['next']);
    }

    if (!empty($params['link'])) {
        $page_button['link'] = $params['link'];
    }

    if ($params['where']) $WHERE = "WHERE " . $params['where'];

    $sql = "SELECT * FROM `sll_blog` 
                $WHERE
                ORDER BY `date_create` DESC
                LIMIT $start,$end;
        ";

    $query = mysqli_query($id_db, $sql) or die(mysqli_error($id_db));

    if (mysqli_num_rows($query) == 0) {
        return false;
    }

    if ($query) {
        return array('query' => mysqli_fetch_all($query, MYSQLI_ASSOC), 'pg' => $page_button);
    } else {
        return false;
    }
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
