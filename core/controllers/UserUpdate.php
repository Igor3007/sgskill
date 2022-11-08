<?php


require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/user.php');






$post = $_POST;

//password

if(!empty($post['password']) || !empty($post['passwordRepeat'])) {
    
    if($post['password'] != $post['passwordRepeat']){
        exit(json_encode([
            'status' => false,
            'msg' => 'Пароли не совпадают'
        ]));
    }

    if(strlen($post['password']) < 6 || strlen($post['passwordRepeat']) < 6){
        exit(json_encode([
            'status' => false,
            'msg' => 'Пароль должен быть не менее 6 символов'
        ]));
    }

}

//email

if(empty($post['email'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Email не может быть пустым'
    ]));
}

//name

if(empty($post['name'])) {
    exit(json_encode([
        'status' => false,
        'msg' => 'Имя не может быть пустым'
    ]));
}


$params = [
    'email' => $post['email'],
    'name' => $post['name'],
    'country' => $post['country'],
    'sex' => $post['sex'],
    'year' => $post['year'],
];

if(!empty($post['password'])){
    $params['pass'] = saltPassword($post['password']);
}

//image
if($_FILES['photo']['size']){
    $saveFile = uploadFile([
        'file' => $_FILES['image']
    ]);

    if($saveFile['status']){
        $params['photo'] = $saveFile['id'];
    }
}

$query = setUserData($params, array( 'id' => $_SESSION['user']['id'] ));

if($query){

    $_SESSION['user']['name'] = $params['name'];
    $_SESSION['user']['photo'] = $params['photo'];

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