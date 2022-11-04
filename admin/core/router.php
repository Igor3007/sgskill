<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/core/app.php'); 

$route = $_GET['view'];

//default config
$PAGE = [

    'TEMPLATE' => 'login',

    'STYLES' => [
        '/styles/admin.css',
        '/styles/common.css',
        
    ],

    'SCRIPTS' => [
        '/js/vendor.js',
        '/js/common.js',
        '/js/admin.js',
    ],

    'LAYOUT' => 'default',
    'BREADCRUMBS' => [
        '/' => 'Главная'
    ]
];

switch($route){

    case 'auth': 

        $PAGE['TEMPLATE'] = 'login';
        $PAGE['STYLES'] = [
            '/styles/main.css'
        ];

    break;

    case 'user-create': 
        $PAGE['TEMPLATE'] = 'user-create';
        require_once('controllers/UserAdd.php');
    break;

    case 'user-list': 
        $PAGE['TEMPLATE'] = 'user-list';
        require_once('controllers/UserList.php');
    break;

    case 'user-edit': 
        $PAGE['TEMPLATE'] = 'user-edit';
    break;

    case 'course-list': 
        $PAGE['TEMPLATE'] = 'course-list';
        require_once('controllers/CourseList.php');
    break;
    
    case 'course-create': 
        $PAGE['TEMPLATE'] = 'course-create';
        //require_once('controllers/CourseList.php');
    break;

    case 'lesson-list': 
        $PAGE['TEMPLATE'] = 'lesson-list';
        require_once('controllers/LessonList.php');
    break;

    case 'lesson-create': 
        $PAGE['TEMPLATE'] = 'lesson-create';
        $PAGE['SCRIPTS'][] = 'https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js';
        $PAGE['SCRIPTS'][] = '/js/editor.js';
        require_once('controllers/CourseList.php');
    break;

    case 'rest': 
        require_once('rest.php');
    break;
    

    default: 

    $PAGE['TEMPLATE'] = 'home';
    

};

?>