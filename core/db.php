<?php 
/* ===============================================================
UPDATE
===============================================================*/

function mysql_update_array($table, $params, $where){
    global $id_db;
     
    $params_query = '';
    $params_where = false;

    foreach($where as $key=>$value){


        if(!$params_where) {
            $params_where .='`'.$key.'`=\''.$value.'\'';  
        }else{
            $params_where .=' AND `'.$key.'`=\''.$value.'\'';  
        }
    }

   
    
    foreach($params AS $key => $value){
        if($where['fn']){
           $params_query .='`'.$key.'`='.$value.',';  
        }else{
           $params_query .='`'.$key.'`=\''.$value.'\',';  
        }
        
    }

    //exit($params_where);
    
    $params_query =  substr($params_query, 0, -1);
    $sql = "UPDATE `$table` SET $params_query WHERE $params_where";
    
    if(mysqli_query($id_db, $sql)){
        return array( "status" => true);
    }else{
        return array( "status" => false, 'err' => mysqli_error($id_db));
    }
    
    
}

/* ===============================================================
INSERT
===============================================================*/

function mysql_insert_array($table, $data, $exclude = array()) {
    global $id_db;
   
   $fields = $values = array();

   if( !is_array($exclude) ) $exclude = array($exclude);

   foreach( array_keys($data) as $key ) {
       if( !in_array($key, $exclude) ) {
           $fields[] = "`$key`";
           $values[] = "'" . mysqli_real_escape_string($id_db, $data[$key]) . "'";
       }
   }

   $fields = implode(",", $fields);
   $values = implode(",", $values);

   if( mysqli_query($id_db, "INSERT INTO `$table` ($fields) VALUES ($values)") ) {
       return array( "status" => true,
                     "mysql_insert_id" => mysqli_insert_id($id_db),
                     "mysql_affected_rows" => mysqli_affected_rows($id_db),
                     "mysql_info" => mysqli_info($id_db)
                   );
   } else {
       return array( "status" => false, "err" => mysqli_error($id_db) );
   }

}
/* ===============================================================
DELETE
===============================================================*/

function mysql_remove_array($params){

    $id = array_keys($params);
    $id = $id[0];
    $value = $params[$id];
    require('../inc/config.php');

    $sql = "DELETE FROM `$params[table]` WHERE $id=$value";
    $query = mysqli_query($id_db, $sql);
    
    if($query){
        return array('status' => true );
    }else{
        return array('status' => false, 'err' => mysqli_error($id_db));
    }
    
}
?>