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

function uploadFile($file){

    require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/media.php');

    $path = '/uploads/image/';


    if($file['size'] > 500000){
        exit(json_encode([
            'status' => false,
            'msg' => 'Размер файла должен быть не более 500 кб',
           
        ]));
    }


    if($file['type'] != 'image/jpeg' && $file['type'] != 'image/png'){
        exit(json_encode([
            'status' => false,
            'msg' => 'Допустимы только jpg/png файлы',
        ]));
    }

    $extends = [
        'jpg' => 'jpg',
        'JPG' => 'jpg',
        'jpeg' => 'jpg',
        'JPEG' => 'jpg',
        'png' => 'png',
        'PNG' => 'png',
    ];

    $nameFile = explode('.', basename($file['name']));
    $nameFile = md5($nameFile[0].time()).'.'.$extends[$nameFile[1]];
    

    if(move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$path.$nameFile)){
        
        $insertFile = setMediaFile([
            'orig' => $path.$nameFile
        ]);

        if($insertFile['status']) {
            return [
                'status' => true,
                'id' => $insertFile['id'],
                'orig' => $path.$nameFile
            ];
        }else{
            return [ 'status' => false  ];
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