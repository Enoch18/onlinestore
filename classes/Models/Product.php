<?php
namespace App\Models;
use App\Database;

class Product extends Database{
    // public column names to for the products table
    public $id;
    public $name;
    public $description;
    public $active;
    public $thumbnail;
    public $price;

    /* 
    This will return all the records in the database
    */
    public function all(){
        $sql = $this->pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
        return json_encode($sql);
    }
    
    /*
    This method is used to save the name, description,
    active, thumbnail and price passed from the controller.
    */
    public function save(){
        $sql = "INSERT INTO products (name, description, thumbnail, price) 
        VALUES (:name, :description, :thumbnail, :price)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':name' => $this->name, 
            ':description' => $this->description,
            ':thumbnail' => $this->thumbnail,
            ':price' => $this->price
        ]);
    }

    /*
    This method is used to update the name, description,
    active, thumbnail and price passed from the controller.
    */
    public function update(){
        $sql = "UPDATE products SET name=?, description=?, thumbnail=?, price=? WHERE id=?";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$this->name, $this->description, $this->thumbnail, $this->price, $this->id]);
    }

    /* This method returns a single product*/
    public function find($id){
        $statement = $this->pdo->prepare("SELECT * FROM products WHERE id=? LIMIT 1"); 
        $statement->execute([$id]); 
        $row = $statement->fetch();
        return json_encode($row);
    }

    /*
    This method deletes single product.
    An Id is passed when the method is called then deletion occures.
    */
    public function delete($id){
        $stmt = $this->pdo->prepare( "DELETE FROM products WHERE id =:id" );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}