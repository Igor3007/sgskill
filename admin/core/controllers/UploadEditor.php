<?php
 
 
if($_FILES['file']['size']){
    $saveFile = uploadFile($_FILES['file']);

    if($saveFile['status']){

        exit(json_encode([
            'status' => true,
            'msg' => 'файл загружен',
            'file' => [
                'id' => $saveFile['id'],
                'orig' => $saveFile['orig'],
            ]
        ]));

         
    }else {
        exit(json_encode([
            'status' => false,
            'msg' => 'UploadEditor: Ошибка загрузки файл',
             
        ]));
    }


    
}

 

?>