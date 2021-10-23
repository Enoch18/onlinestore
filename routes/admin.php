<?php
require_once 'Controllers/admin/AdminPagesController.php';

route('/admin', function(){
    $pages = New AdminPagesController;
    return $pages->admin();
});

route('/admin-orders', function(){
    $pages = New AdminPagesController;
    return $pages->orders();
});

route('/admin-products', function(){
    $pages = New AdminPagesController;
    return $pages->products();
});

route('/admin-customers', function(){
    $pages = New AdminPagesController;
    return $pages->customers();
});

route('/admin-reports', function(){
    $pages = New AdminPagesController;
    return $pages->reports();
});