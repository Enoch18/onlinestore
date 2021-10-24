<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\admin\AdminPagesController;

$router = new Router();

$router->get('/admin', function(){
    echo "Hi, I am here";
});

// route('/admin-orders', function(){
//     $pages = New AdminPagesController;
//     return $pages->orders();
// });

// route('/admin-products', function(){
//     $pages = New AdminPagesController;
//     return $pages->products();
// });

// route('/admin-customers', function(){
//     $pages = New AdminPagesController;
//     return $pages->customers();
// });

// route('/admin-reports', function(){
//     $pages = New AdminPagesController;
//     return $pages->reports();
// });