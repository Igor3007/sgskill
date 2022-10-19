<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/user.php');


$post = $_POST;

$userData = getUserData($post['email']);

if(empty($post['email'])){
    exit(json_encode([
        'status' => false,
        'msg' => 'Поле Email не может быть пустым'
    ]));
}

if($userData) {

    if(saltPassword($post['password']) != $userData['pass']){
        exit(json_encode([
            'status' => false,
            'msg' => 'Не верный пароль'
        ]));
    }

    $_SESSION['user'] = [
        'name' => $userData['name'],
        'access' => $userData['access'],
        'photo' => $userData['photo'],
        'courses' => $userData['courses'],
        'email' => $userData['email'],
        'country' => $userData['country'],
        'sex' => $userData['sex'],
        'id' => $userData['id']
    ];

    exit(json_encode([
        'status' => true,
        'msg' => 'Вход...',
        'id' => $_SESSION['user']['id'],
        'location' => '/user/'
    ]));

}else{
    exit(json_encode([
        'status' => false,
        'msg' => 'Пользователь с таким Email не найден или удален'
    ]));
}



?>