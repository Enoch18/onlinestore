<?php
require_once 'Models/Product.php';

class ProductsController{
    public function index(){
        $products = new Product;
        return $products->all();
    }

    /*
    Storing data to the database. The product model is called which 
    in does the strong of the values that are passed in the controller.
    */
    public function store(){
        /* The productValidation method is coming from the helper's file 
            which is located in the helopers directory
        */
        $errors = productValidation($_POST['name'], $_POST['description'], '', $_POST['price']);
        
        if (count($errors) > 0){
            return $errors;
        }

        $path = '';
        if(isset($_FILES['thumbnail'])){
            /* The productsImageUpload method is coming from the helper's file 
                which is located in the helopers directory
            */
            $path = productsImageUpload($_FILES['thumbnail']);
        }

        // String the values that have been submited after finding no validation errors
        $products = new Product;
        $products->name = $_POST['name'];
        $products->description = $_POST['description'];
        $products->thumbnail = $path;
        $products->price = $_POST['price'];
        $products->save();
        return 'Stored Successfully';
    }

    public function update(){
        /* The productValidation method is coming from the helper's file 
            which is located in the helopers directory
        */
        $errors = productValidation($_POST['name'], $_POST['description'], '', $_POST['price']);
        
        if (count($errors) > 0){
            return $errors;
        }

        $path = $_POST['path_url'];
        if(file_exists($_FILES['thumbnail']['tmp_name']) || is_uploaded_file($_FILES['thumbnail']['tmp_name'])) {
            /* The productsImageUpload method is coming from the helper's file 
                which is located in the helopers directory
            */
            $path = productsImageUpload($_FILES['thumbnail']);
        }

        // String the values that have been submited after finding no validation errors
        $products = new Product;
        $products->id = $_POST['id'];
        $products->name = $_POST['name'];
        $products->description = $_POST['description'];
        $products->thumbnail = $path;
        $products->price = $_POST['price'];
        $products->update();
        return 'Updated Successfully';
    }

    public function show($id){
        $products = new Product;
        return $products->find($id);
    }

    public function destroy(){
        $products = new Product;
        $products->delete($_POST['delete_id']);
        return 'Deleted Successfully';
    }
}