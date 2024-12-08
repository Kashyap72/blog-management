<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';

// Autoload Controllers and Models
spl_autoload_register(function ($className) {
    $paths = ['controllers/', 'models/'];
    foreach ($paths as $path) {
        $file = __DIR__ . '/' . $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Parse URL to determine the route
$request = str_replace('/blog-management', '', $_SERVER['REQUEST_URI']);
$request = strtok($request, '?'); // Remove query string if present

// Default route to blog-list
if (empty($request) || $request === '/') {
    $request = '/blog-list';
}
// Use namespaces for controllers
use Frontend\BlogController;
use Backend\AuthController;
use Backend\MasterController;
use Backend\UserController;

$fcontroller = new BlogController();
$authcontroller = new AuthController();
$blogconteroller = new MasterController();
$userconteroller = new UserController();
// print_r($request); die();
// Route handling
switch ($request) {
    case '/blog/submitComment':
        $fcontroller->submitComment();
        break;

    case '/blog-detail':
        $fcontroller->blogDetail();
        break;

    case '/blog-list':
        $fcontroller->listBlogs();
        break;

    case '/admin':
        $authcontroller->showlogin();
        break;

    case '/auth/login':
        $authcontroller->authlogin();
        break;


    case '/admin/dashboard':
        $blogconteroller->bloglist();
        break;

    case '/admin/blogview':
        $blogconteroller->blogview();
        break;

    case '/admin/edit-blog':
        $blogconteroller->blogedit();
        break;

    case '/admin/addblock':
        $blogconteroller->blogadd();
        break;

    case '/admin/blog/changeStatus':
        $blogconteroller->changeStatus();
        break;

    case '/admin/admin/delete/blog':
        $blogconteroller->delete();
        break;

    case '/admin/updateblock':
        $blogconteroller->blogupdate();
        break;

    case '/admin/commentlist':
        $blogconteroller->commentlist();
        break;

    case '/admin/comment/status':
        $blogconteroller->updateCommentStatus();
        break;

    case '/admin/admin/delete/comment':
        $blogconteroller->commentdelete();
        break;

    case '/admin/userlist':
        $userconteroller->userlist();
        break;

    case '/admin/adduser':
        $userconteroller->useradd();
        break;
    case '/admin/admin/delete/user':
        $userconteroller->userdelete();
        break;

    case '/admin/user/changeStatus':
        $userconteroller->changeStatus();
        break;

    case '/admin/edituser':
        $userconteroller->useredit();
        break;

    case '/admin/updateuser':
        $userconteroller->userupdate();
        break;

    case '/admin/forgetpassword':
        $authcontroller->forgetpassword();
        break;

    case '/admin/logout':
        $authcontroller->logout();
        break;
    case '/admin/handleEmailInput':
        $authcontroller->handleEmailInput();
        break;

    case '/admin/resetpassword':
        $authcontroller->resetpassword();
        break;
        // Other cases for different routes dashboard.php userconteroller  admin/delete/user   resetpassword
    default:
        http_response_code(404);
        include __DIR__ . '/views/errors/404.php';
        break;
}
