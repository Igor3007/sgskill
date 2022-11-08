<?php
 
 
if($_FILES['file']['size']){

    if($_POST['type'] == 'image'){
        $saveFile = uploadFile([
            'file' => $_FILES['file'],
        ]);
    }

    if($_POST['type'] == 'file'){
        $saveFile = uploadFile([
            'file' => $_FILES['file'],
            'path' => '/uploads/files/',
            'type' => 'files'
        ]);
    }

    

    if($saveFile['status']){

        exit(json_encode([
            'status' => true,
            'msg' => 'Файл загружен',
            'file' => [
                'id' => $saveFile['id'],
                'orig' => $saveFile['orig'],
            ]
        ]));

         
    }else {
        exit(json_encode([
            'status' => false,
            'msg' => 'UploadEditor: Ошибка загрузки файлa',
             
        ]));
    }


    
}

 

?>