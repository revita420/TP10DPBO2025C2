<?php

class Order
{
    private $id;
    private $product_id;
    private $baker_id;
    private $quantity;
    private $order_date;
    private $status;
    private $created_at;

    // For displaying related data
    private $product_name;
    private $baker_name;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getBakerId()
    {
        return $this->baker_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getOrderDate()
    {
        return $this->order_date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getProductName()
    {
        return $this->product_name;
    }

    public function getBakerName()
    {
        return $this->baker_name;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function setBakerId($baker_id)
    {
        $this->baker_id = $baker_id;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setOrderDate($order_date)
    {
        $this->order_date = $order_date;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    public function setBakerName($baker_name)
    {
        $this->baker_name = $baker_name;
    }
}

?>