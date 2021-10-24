<?php
namespace App\Controllers;

class PagesController{
    /*
    These methods are just returning the page that should be displayed.
    The view method is found in the helpers. It is one of the helper functions.
    */

    public function index(){
        return view('views.pages.index');
    }

    public function about(){
        return view('views.pages.about');
    }

    public function products(){
        return view('views.pages.products');
    }

    public function productDetails(){
        return view('views.pages.product-details');
    }
}