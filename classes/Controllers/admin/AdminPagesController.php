<?php
namespace App\Controllers\admin;

class AdminPagesController{
    public function admin(){
        return view('views.pages.admin.index');
    }

    public function customers(){
        return view('views.pages.admin.customers');
    }

    public function orders(){
        return view('views.pages.admin.orders');
    }

    public function products(){
        return view('views.pages.admin.products');
    }

    public function reports(){
        return view('views.pages.admin.reports');
    }
}