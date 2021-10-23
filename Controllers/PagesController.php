<?php
class PagesController{
    public function index(){
        return view('views/pages/index.php');
    }

    public function about(){
        return view('views/pages/about.php');
    }

    public function products(){
        return view('views/pages/products.php');
    }

    public function productDetails(){
        return view('views/pages/product-details.php');
    }
}