<?php

session_start();

function is_user(){
    return array(
        'name' => $_SESSION['user']['name'],
        'country' => $_SESSION['user']['country'],
        'sex' => $_SESSION['user']['sex'],
        'email' => $_SESSION['user']['email'],
        'access' => $_SESSION['user']['access'],
        'photo' => $_SESSION['user']['photo'],
        'courses' => $_SESSION['user']['courses'],
        'login' => ($_SESSION['user'] ? true : false)
    );
}

function uploadFile($setting){

    require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/media.php');

    $default = [
        'file' => false,
        'type' => 'image',
        'path' => '/uploads/image/'
    ];

    $params = array_replace($default, $setting);

    if(!$params['file']){
        exit(json_encode([
            'status' => false,
            'msg' => 'Отсуствует файл',
        ]));
    }


    switch($params['type']){

        case 'image' : 

            if($params['file']['type'] != 'image/jpeg' && $params['file']['type'] != 'image/png'){
                exit(json_encode([
                    'status' => false,
                    'msg' => 'Допустимы только jpg/png файлы',
                ]));
            }

            if($params['file']['size'] > 500000){
                exit(json_encode([
                    'status' => false,
                    'msg' => 'Размер файла должен быть не более 500 кб',
                ]));
            }

            break;

        case 'files' : 

            if($params['file']['size'] > 5000000){
                exit(json_encode([
                    'status' => false,
                    'msg' => 'Размер файла должен быть не более 5MB',
                ]));
            }

            break;

    }

    

    $extends = [
        'jpg' => 'jpg',
        'JPG' => 'jpg',
        'jpeg' => 'jpg',
        'JPEG' => 'jpg',
        'png' => 'png',
        'PNG' => 'png',
        'mp3' => 'mp3',
        'MP3' => 'mp3',
        'doc' => 'doc',
        'XLS' => 'xls',
        'xls' => 'xls',
        'ZIP' => 'zip',
        'zip' => 'zip',
        'RAR' => 'rar',
        'rar' => 'rar',
    ];

    

    $nameFile = explode('.', basename($params['file']['name']));

    if(!$extends[$nameFile[1]]){
        exit(json_encode([
            'status' => false,
            'msg' => 'Не поддерживаемый формат файла',
        ]));
    }

    $nameFile = md5($nameFile[0].time()).'.'.$extends[$nameFile[1]];

   


    if(move_uploaded_file($params['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$params['path'].$nameFile)){
        
        $insertFile = setMediaFile([
            'orig' => $params['path'].$nameFile
        ]);

        if($insertFile['status']) {
            return [
                'status' => true,
                'id' => $insertFile['id'],
                'orig' => $params['path'].$nameFile
            ];
        }else{
            return [ 'status' => false, 'msg' => 'Ошибка записи файла в базу'];
        }

    }else{
        exit(json_encode([
            'status' => false,
            'msg' => 'А нихуяя',
        ]));
    }

    

}

function getMediaURL($ids){

    require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/media.php');
    return getMediaData($ids);
}

function saltPassword($pass) {
    $salt = '@$%^*(*&*&^%%^jhdwiehdwIOJHIUDHiuywhdqhd';
    return md5($pass.$salt);
}

function activeSelect($array, $active){

    foreach($array as $key => $value){
        echo '<option '.($key == $active ? 'selected="selected"':'' ).' value="'.$key.'" >'.$value.'</option>';
    }

}

$country = [
    'ru' => 'Россия',
    'by' => 'Беларусь',
    'kz' => 'Казахстан',
    'ua' => 'Украина',
];

$sex = [
    '1' => 'Мужской',
    '2' => 'Женский'
];

 


?>