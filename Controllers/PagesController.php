<?php
class PagesController{
    public function index(){
        return view('views/pages/index.php');
    }

    public function about(){
        return view('views/pages/about.php');
    }
}