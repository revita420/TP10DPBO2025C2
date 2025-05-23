<?php

include_once 'model/Product.php';

class ProductViewModel
{
    private $connection;
    private $product;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->product = new Product();
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM products ORDER BY name";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $products = array();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setDescription($row['description']);
            $product->setPrice($row['price']);
            $product->setCreatedAt($row['created_at']);
            
            $products[] = $product;
        }

        return $products;
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setDescription($row['description']);
            $product->setPrice($row['price']);
            $product->setCreatedAt($row['created_at']);
            
            return $product;
        }

        return null;
    }

    public function createProduct($name, $description, $price)
    {
        $query = "INSERT INTO products (name, description, price) 
                 VALUES (:name, :description, :price)";
        
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':price', $price);
        
        return $statement->execute();
    }

    public function updateProduct($id, $name, $description, $price)
    {
        $query = "UPDATE products SET 
                 name = :name, 
                 description = :description, 
                 price = :price 
                 WHERE id = :id";
        
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':price', $price);
        
        return $statement->execute();
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        
        return $statement->execute();
    }
}

?>