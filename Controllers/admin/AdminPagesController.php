<?php
class AdminPagesController{
    public function admin(){
        return view('views/pages/admin/index.php');
    }

    public function customers(){
        return view('views/pages/admin/customers.php');
    }

    public function orders(){
        return view('views/pages/admin/orders.php');
    }

    public function products(){
        return view('views/pages/admin/products.php');
    }

    public function reports(){
        return view('views/pages/admin/reports.php');
    }
}