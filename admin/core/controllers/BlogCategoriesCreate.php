<?

require_once($_SERVER['DOCUMENT_ROOT'].'/core/db.php');


$id_catig = $_POST['id'];
$name = $_POST['name'];

$params = [
    'name' => $name
];

if(empty($id_catig)){
    mysql_insert_array('sll_blog-categories', $params);

    exit(json_encode([
        'status' => true,
        'msg' => 'Добавлено!'
    ]));

}else{
    mysql_update_array('sll_blog-categories', $params, ['id' => $id_catig]);

    exit(json_encode([
        'status' => true,
        'msg' => 'Сохранено !'
    ]));
}

exit(json_encode([
    'status' => false,
    'msg' => 'error create catig for blog'
]));
?>