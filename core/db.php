<?php 
/* ===============================================================
UPDATE
===============================================================*/

function mysql_update_array($table, $params, $id){
    global $id_db;
     
    $params_query = '';
    $id_key = array_keys($id);
    $id_key = $id_key[0];
    $id_value = $id[$id_key];
    
    foreach($params AS $key => $value){
        if($id['fn']){
           $params_query .='`'.$key.'`='.$value.',';  
        }else{
           $params_query .='`'.$key.'`=\''.$value.'\',';  
        }
        
    }
    
    $params_query =  substr($params_query, 0, -1);
    $sql = "UPDATE $table SET $params_query WHERE $id_key=$id_value";
    
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

?>