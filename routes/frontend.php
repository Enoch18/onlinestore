<?php 
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\PagesController;
use App\Controllers\admin\AdminPagesController;

$router = new Router();

$router->get('/', function(){
    $page = new PagesController;
    $page->index();
});

$router->get('/about', function(){
    $page = new PagesController;
    $page->about();
});

$router->get('/products', function(){
    $page = New PagesController;
    return $page->products();
});

$router->get('/product-details', function(){
    $page = New PagesController;
    return $page->productDetails();
});

/*
    The routes below are all the routes for the admin panel
*/
$router->get('/admin', function(){
    $page = New AdminPagesController;
    return $page->admin();
});

$router->get('/admin/customers', function(){
    $page = New AdminPagesController;
    return $page->customers();
});

$router->get('/admin/orders', function(){
    $page = New AdminPagesController;
    return $page->orders();
});

// Getting products
$router->get('/admin/products', function(){
    $page = New AdminPagesController;
    return $page->products();
});

// Posting products
$router->post('/admin/products', function(){
    $page = New AdminPagesController;
    return $page->products();
});

$router->get('/admin/reports', function(){
    $page = New AdminPagesController;
    return $page->reports();
});

// The not found page
$router->addNotFoundHandler(function(){
    echo "Page not found";
});

$router->run();