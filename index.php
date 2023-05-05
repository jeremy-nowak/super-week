<?php

use App\Controller\AuthControler;
use App\Controller\UserController;
use App\Controller\AuthController;
use App\Controller\BooksController;
session_start();
require 'vendor/autoload.php';
$router = new AltoRouter();
$router->setBasePath('/super-week');

$router->map('GET', '/', function () {
    echo "<h1>Bienvenu sur l’accueil</h1>";
}, 'home');

$router->map('GET', '/users', function () {
    $userController = new UserController();
    $userController->list();
}, 'users');

// ---------------------------Users id .json-------------------------------
$router->map('GET', '/users/[i:id]', function ($id) {
    $userControleur = new UserController();
    $userControleur->displayUserInfo($id);
}, 'users.json');

$router->map('GET', '/users/fill', function () {
    $userController = new UserController();
    $userController->fill();
}, 'fill');

// -----------------------Register-------------------------------------
$router->map('GET', '/register', function () {
    require "src/View/register.php";
}, 'display_register');

$router->map('POST', '/register', function () {
    $authControleur = new AuthControler();
    $authControleur->register();
    
}, 'register');

// ----------------------------Login-------------------------------------

$router->map('GET', '/login', function () {
    $authControleur = new AuthControler();
    $authControleur->logFormDisplay();
}, 'display_login');

$router->map('POST', '/login', function () {
    $authControleur = new AuthControler();
    $authControleur->userConnect();
}, 'login');

// -------------------------Logout----------------------------------------


$router->map('GET', '/logout', function () {
    $authControleur = new AuthControler();
    $authControleur->logout();
    require "src/View/login.php";
}, 'logout');

// ---------------------------Books/write--------------------------------

    $router->map('GET', '/books/write', function () {
    $bookController = new BooksController();
    $bookController->displayBookForm();
    

}, 'booksDisplayForm');

    $router->map('POST','/books/write', function() {
    $bookController = new booksController();
    $bookController->addBook();

}, 'booksAdd');

    $router->map('GET','/books', function() {
    $bookController = new booksController();
    $bookController->displayBooks();

}, 'booksDisplay');





// match
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

?>