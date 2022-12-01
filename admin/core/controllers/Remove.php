<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/db.php');

if (!$_POST['id']) {
    exit(json_encode([
        'status' => false,
        'msg' => 'error: not id for remove',
    ]));
}


switch ($_POST['action']) {

    case 'removeLesson':

        $query = mysql_remove_array([
            'id' => $_POST['id'],
            'table' => 'sll_lesson',
        ]);

        if ($query['status']) {
            exit(json_encode([
                'status' => true,
                'msg' => 'Удалено!',
                'reload' => true
            ]));
        }

        break;

    case 'removeCourse':

        $query = mysql_remove_array([
            'id' => $_POST['id'],
            'table' => 'sll_courses',
        ]);

        if ($query['status']) {
            exit(json_encode([
                'status' => true,
                'msg' => 'Удалено!',
                'reload' => true
            ]));
        }

        break;

    case 'removeCatig':

        $query = mysql_remove_array([
            'id' => $_POST['id'],
            'table' => 'sll_blog-categories',
        ]);

        if ($query['status']) {
            exit(json_encode([
                'status' => true,
                'msg' => 'Удалено!',
                'reload' => true
            ]));
        }

        break;

    case 'removePost':

        $query = mysql_remove_array([
            'id' => $_POST['id'],
            'table' => 'sll_blog',
        ]);

        if ($query['status']) {
            exit(json_encode([
                'status' => true,
                'msg' => 'Удалено!',
                'reload' => true
            ]));
        }

        break;

    case 'removePage':

        $query = mysql_remove_array([
            'id' => $_POST['id'],
            'table' => 'sll_pages',
        ]);

        if ($query['status']) {
            exit(json_encode([
                'status' => true,
                'msg' => 'Удалено!',
                'reload' => true
            ]));
        }

        break;
}

if ($query['status']) {
    exit(json_encode([
        'status' => true,
        'msg' => 'Удалено!',
    ]));
}


exit(json_encode([
    'status' => false,
    'msg' => ($query['err'] ? $query['err'] : 'error: delete database'),
]));
