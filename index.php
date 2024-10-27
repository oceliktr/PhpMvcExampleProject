<?php
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/SiteController.php';
require_once 'core/Router.php';


$router = new Router();
// url: /
$router->add('GET', '/(User/List)?', function () {
    $controller = new UserController();
    $controller->index();
});

//url: /User/Create
$router->add('GET', '/User/create', function () {
    $controller = new UserController();
    $controller->create();
});
$router->add('POST', '/User/store', function () {
    $controller = new UserController();
    $controller->store();
});
$router->add('GET', '/Site/about', function () {
    $controller = new SiteController();
    $controller->about();
});

$router->add('GET', '/User/Detail/{id}', function ($id) {
    $id= htmlspecialchars($id);
    $controller = new UserController();
    $controller->detail($id);
});

$router->add('GET', '/Site/contact', function () {
    $controller = new SiteController();
    $controller->contact();
});

// Rotaları işle
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$router->dispatch($requestUri, $requestMethod);