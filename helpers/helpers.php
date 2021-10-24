<?php
function view($path){
    $path = str_replace('.', '/', $path);
    $path = $path . '.php';
    require_once $path;
}

function include_file($path){
    $path = str_replace('.', '/', $path);
    $path = $path . '.php';
    require_once $path;
}

function productValidation($name, $description, $thumbnail, $price){
    $errors = [];
    if ($name == ''){
        array_push($errors, ['name_error' => 'Product name cannot be empty']);
    }

    if ($description == ''){
        array_push($errors, ['description_error' => 'Product description cannot be empty']);
    }

    if ($price == ''){
        array_push($errors, ['price_error' => 'Product price cannot be empty']);
    }

    if (!is_numeric($price)){
        array_push($errors, ['price_error' => 'Enter a valid price']);
    }

    return $errors;
}

/*
    This method is the one being used to upload the 
    images that are being uploaded when creating a
    product. It also checks if the image is of a 
    valid format.
*/
function productsImageUpload($files){
    if(isset($files)){
        $path = "images/" . date('Y') . '/' . date('M') . '/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $errors= array();
        $file_name = $files['name'];
        $file_size =$files['size'];
        $file_tmp =$files['tmp_name'];
        $file_type=$files['type'];
        $file_ext=strtolower(explode('.',$files['name'])[1]);
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp, $path .$file_name);
        }else{
            return ['An error occured'];
        }

        return $path . $file_name;
    }
}