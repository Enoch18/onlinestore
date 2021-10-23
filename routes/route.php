<?php
require_once 'config/Database.php';
require_once 'Controllers/PagesController.php';
require_once 'helpers/helpers.php';

route('/', function(){
    $pages = New PagesController;
    return $pages->index();
});

route('/products', function(){
    $pages = New PagesController;
    return $pages->products();
});

route('/product-details', function(){
    $pages = New PagesController;
    return $pages->productDetails();
});

route('/about-us', function(){
    $pages = New PagesController;
    return $pages->about();
});