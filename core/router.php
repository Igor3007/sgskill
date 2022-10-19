<?php 

function getCurrentRoute(){
    if(($pos = strpos($_SERVER['REQUEST_URI'], '?')) !== false){
        $route = substr($_SERVER['REQUEST_URI'], 0, $pos);
        }
        $route = is_null($route) ? $_SERVER['REQUEST_URI'] : $route;
        $route = explode('/', $route);
        array_shift($route);
        $result[0] = array_shift($route);
        $result[1] = array_shift($route);
        $result[2] = $route;
        return $result;
}

$route = getCurrentRoute();

//default config
$PAGE = [

    'TEMPLATE' => 'login',

    'STYLES' => [
        '/styles/site.css',
        
    ],

    'SCRIPTS' => [
        '/js/vendor.js',
        '/js/common.js',
    ],

    'LAYOUT' => 'default',
    'BREADCRUMBS' => [
        '/' => 'Главная'
    ]
];

switch($route[0]){

    case 'login': 

        $PAGE['TEMPLATE'] = 'login';
        $PAGE['SCRIPTS'][] = '/js/user.js';
        $PAGE['STYLES'] = [
            '/styles/main.css'
        ];

        require_once('controllers/Login.php');

    break;

    case 'user': 

        require_once('controllers/User.php');
        

        $PAGE['TEMPLATE'] = 'courses';
        $PAGE['LAYOUT'] = 'user-layout';
        $PAGE['STYLES'] = [
            '/styles/main.css',
            '/styles/common.css'
        ];
        $PAGE['SCRIPTS'][] = '/js/user.js';

        $PAGE['BREADCRUMBS']['/user'] = 'Личный кабинет';
        $PAGE['h1'] = 'Мои курсы';

        switch($route[1]){
            case 'courses':
                $PAGE['BREADCRUMBS']['courses'] = 'Мои курсы';
            break;

            case 'cours':
                $PAGE['BREADCRUMBS']['/user/courses/'] = 'Мои курсы';
                $PAGE['TEMPLATE'] = 'cours';

                require_once('controllers/Cours.php');
            break;

            case 'lesson':
                $PAGE['BREADCRUMBS']['/user/courses/'] = 'Мои курсы';
                $PAGE['TEMPLATE'] = 'lesson';

                require_once('controllers/Lesson.php');
            break;

            case 'profile':
                $PAGE['BREADCRUMBS']['/user/profile'] = 'Профиль';
                $PAGE['TEMPLATE'] = 'profile';
                $PAGE['h1'] = 'Профиль';

                require_once('controllers/Profile.php');
            break;
        }

    break;

    case 'blog': 
        
        $PAGE['TEMPLATE'] = 'home';
        $PAGE['SCRIPTS'][] = '/js/main.js';

        switch($route[1]){
            case 'article':
                $PAGE['TEMPLATE'] = 'blog-details';
            break;
        }

    break;

    case 'about': 
        
        $PAGE['TEMPLATE'] = 'page';
        $PAGE['SCRIPTS'][] = '/js/main.js';
        $PAGE['h1'] = 'О проекте';

    break;

     



    case 'logout': 
        $_SESSION['user'] = null;
        header('location: /login/');
    break;



    case 'api': 
        require_once('rest.php');
    break;


    default: 

     $PAGE['TEMPLATE'] = 'home';
     $PAGE['SCRIPTS'][] = '/js/main.js';
    

};

?>