<?php

$data = serialize($_POST);


if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/core/setting.php', $data)) {
    exit(json_encode([
        'status' => true,
        'msg' => 'Настройки успешно сохранены',
    ]));
} else {
    exit(json_encode([
        'status' => true,
        'msg' => 'Ошибка записи в файл',
    ]));
}
