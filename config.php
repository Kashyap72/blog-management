<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/controllers/UserController.php';

// Parse the URL to determine the requested page
$request = $_SERVER['REQUEST_URI'];
$basePath = 'blog-management/';
$route = str_replace($basePath, '', $request);
$route = strtok($route, '?'); // Remove query string if present
define('BASE_URL', 'http://localhost/blog-management/');

?>
