<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/user.php');
 

$post = $_POST;

//name
if(empty($post['name'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Имя не может быть пустым'
    ]));
}


//password
if(strlen($post['pass']) < 6  ){
    exit(json_encode([
        'status' => false,
        'msg' => 'Пароль должен быть не менее 6 символов'
    ]));
}

//email
if(empty($post['email'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Email не может быть пустым'
    ]));
}

if(getUserData($post['email'])){
    exit(json_encode([
        'status' => false,
        'msg' => 'Такой Email уже зарегистрирован'
    ]));
}

 

$params = [
    'email' => $post['email'],
    'name' => $post['name'],
    'country' => $post['country'],
    'sex' => $post['sex'],
    'year' => $post['year'],
    
];

if(count($post['courses'])){
    $params['courses'] = implode(',', $post['courses']);
}

if(!empty($post['pass'])){
    $params['pass'] = saltPassword($post['pass']);
}

//image
if($_FILES['image']['size']){
    $saveFile = uploadFile([
        'file' => $_FILES['image']
    ]);

    if($saveFile['status']){
        $params['photo'] = $saveFile['id'];
    }
}

$query = createUser($params);

if($query){
    exit(json_encode([
        'status' => true,
        'msg' => 'Сохранено'
    ]));
}else{
    exit(json_encode([
        'status' => false,
        'msg' => 'Ошибка соединения с базой'
    ]));
}

exit();

?>