<?php



function getCurrentRoute()
{
    if (($pos = strpos($_SERVER['REQUEST_URI'], '?')) !== false) {
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
    'SEO_TITLE' => 'sg-skill',
    'SEO_DESC' =>  'sg-skill',
    'SEO_KEY'  =>  'sg-skill',

    'STYLES' => [
        '/styles/site.css',
        '/styles/common-site.css'
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

switch ($route[0]) {

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

        $PAGE['SCRIPTS'][] = '/js/fancybox.umd.js';
        $PAGE['STYLES'][]  = '/styles/lib/fancybox-4.css';


        $PAGE['BREADCRUMBS']['/user'] = 'Личный кабинет';
        $PAGE['h1'] = 'Мои курсы';

        switch ($route[1]) {
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

            case 'lesson-next':

                require_once('controllers/LessonNext.php');
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

        $PAGE['TEMPLATE'] = 'blog';
        $PAGE['SCRIPTS'][] = '/js/main.js';
        //$PAGE['STYLES'][] = '/styles/common-site.css';
        $PAGE['SEO_TITLE'] = 'Блог - sg-skill';

        require_once('controllers/Blog.php');

        switch ($route[1]) {
            case 'article':

                $PAGE['TEMPLATE']  = 'blog-details';
                $PAGE['SCRIPTS'][] = '/js/fancybox.umd.js';
                $PAGE['STYLES'][]  = '/styles/lib/fancybox-4.css';

                require_once('controllers/BlogArticle.php');

                $PAGE['SEO_TITLE'] = ($data['seo_title'] ? $data['seo_title'] : $data['title']);
                $PAGE['SEO_DESC']  = $data['seo_desc'];
                $PAGE['SEO_KEY']   = $data['seo_keywords'];

                break;

            case 'category':
                $PAGE['TEMPLATE']  = 'blog';
                require_once('controllers/BlogCategory.php');
                break;

            case 'tag':
                $PAGE['TEMPLATE']  = 'blog-tag';
                require_once('controllers/BlogTags.php');
                break;
        }

        break;

    case 'page':

        $PAGE['TEMPLATE'] = 'page';
        $PAGE['SCRIPTS'][] = '/js/main.js';
        $PAGE['SCRIPTS'][] = '/js/fancybox.umd.js';
        $PAGE['STYLES'][]  = '/styles/lib/fancybox-4.css';

        require_once('controllers/Pages.php');

        $PAGE['SEO_TITLE'] = ($data['seo_title'] ? $data['seo_title'] : $data['title']);
        $PAGE['SEO_DESC']  = $data['seo_desc'];
        $PAGE['SEO_KEY']   = $data['seo_keywords'];

        break;





    case 'logout':
        $_SESSION['user'] = null;
        header('location: /login/');
        break;






    case 'api':
        require_once('rest.php');
        break;


    default:

        $PAGE['SCRIPTS'][] = '/js/fancybox.umd.js';
        $PAGE['STYLES'][]  = '/styles/lib/fancybox-4.css';

        require_once('controllers/RouterDefault.php');
};
