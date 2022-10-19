<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/inc/config.php');

function getMediaData($ids){

    /* ids = '1,2' */

    global $id_db;

    if($ids == null ){
        return false;
    }

    $sql = "SELECT * FROM `sll_media` WHERE `id` IN ($ids) ";

    $query = mysqli_query($id_db, $sql) or die('error getMediaData:'.mysqli_error($id_db));

    return mysqli_num_rows($query) > 1 ? mysqli_fetch_all($query, MYSQLI_ASSOC) : mysqli_fetch_assoc($query);
}

function setMediaFile($file){

    $params = [
        'orig' => $file['orig']
    ];

    $query = mysql_insert_array('sll_media', $params);

    if($query){
        return [
            'status' => true,
            'id' => $query['mysql_insert_id']
        ];
    }else{
        return [
            'status' => false,
        ];
    }
    
}


?>