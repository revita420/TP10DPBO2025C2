<?php

include_once 'model/Order.php';

class OrderViewModel
{
    private $connection;
    private $order;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->order = new Order();
    }

    public function getAllOrders()
    {
        $query = "SELECT o.*, p.name as product_name, b.name as baker_name 
                 FROM orders o 
                 JOIN products p ON o.product_id = p.id 
                 JOIN bakers b ON o.baker_id = b.id 
                 ORDER BY o.order_date DESC";
                 
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $orders = array();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $order = new Order();
            $order->setId($row['id']);
            $order->setProductId($row['product_id']);
            $order->setBakerId($row['baker_id']);
            $order->setQuantity($row['quantity']);
            $order->setOrderDate($row['order_date']);
            $order->setStatus($row['status']);
            $order->setCreatedAt($row['created_at']);
            $order->setProductName($row['product_name']);
            $order->setBakerName($row['baker_name']);
            
            $orders[] = $order;
        }

        return $orders;
    }

    public function getOrderById($id)
    {
        $query = "SELECT o.*, p.name as product_name, b.name as baker_name 
                 FROM orders o 
                 JOIN products p ON o.product_id = p.id 
                 JOIN bakers b ON o.baker_id = b.id 
                 WHERE o.id = :id";
                 
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $order = new Order();
            $order->setId($row['id']);
            $order->setProductId($row['product_id']);
            $order->setBakerId($row['baker_id']);
            $order->setQuantity($row['quantity']);
            $order->setOrderDate($row['order_date']);
            $order->setStatus($row['status']);
            $order->setCreatedAt($row['created_at']);
            $order->setProductName($row['product_name']);
            $order->setBakerName($row['baker_name']);
            
            return $order;
        }

        return null;
    }

    public function createOrder($product_id, $baker_id, $quantity, $status)
    {
        $query = "INSERT INTO orders (product_id, baker_id, quantity, status) 
                 VALUES (:product_id, :baker_id, :quantity, :status)";
        
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':product_id', $product_id);
        $statement->bindParam(':baker_id', $baker_id);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':status', $status);
        
        return $statement->execute();
    }

    public function updateOrder($id, $product_id, $baker_id, $quantity, $status)
    {
        $query = "UPDATE orders SET 
                 product_id = :product_id, 
                 baker_id = :baker_id, 
                 quantity = :quantity, 
                 status = :status 
                 WHERE id = :id";
        
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':product_id', $product_id);
        $statement->bindParam(':baker_id', $baker_id);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':status', $status);
        
        return $statement->execute();
    }

    public function deleteOrder($id)
    {
        $query = "DELETE FROM orders WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        
        return $statement->execute();
    }
}

?>