<?php

include_once 'model/Baker.php';

class BakerViewModel
{
    private $connection;
    private $baker;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->baker = new Baker();
    }

    public function getAllBakers()
    {
        $query = "SELECT * FROM bakers ORDER BY name";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $bakers = array();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $baker = new Baker();
            $baker->setId($row['id']);
            $baker->setName($row['name']);
            $baker->setSpecialty($row['specialty']);
            $baker->setJoinDate($row['join_date']);
            $baker->setContact($row['contact']);
            $baker->setCreatedAt($row['created_at']);
            
            $bakers[] = $baker;
        }

        return $bakers;
    }

    public function getBakerById($id)
    {
        $query = "SELECT * FROM bakers WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $baker = new Baker();
            $baker->setId($row['id']);
            $baker->setName($row['name']);
            $baker->setSpecialty($row['specialty']);
            $baker->setJoinDate($row['join_date']);
            $baker->setContact($row['contact']);
            $baker->setCreatedAt($row['created_at']);
            
            return $baker;
        }

        return null;
    }

    public function createBaker($name, $specialty, $join_date, $contact)
    {
        $query = "INSERT INTO bakers (name, specialty, join_date, contact) 
                 VALUES (:name, :specialty, :join_date, :contact)";
        
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':specialty', $specialty);
        $statement->bindParam(':join_date', $join_date);
        $statement->bindParam(':contact', $contact);
        
        return $statement->execute();
    }

    public function updateBaker($id, $name, $specialty, $join_date, $contact)
    {
        $query = "UPDATE bakers SET 
                 name = :name, 
                 specialty = :specialty, 
                 join_date = :join_date, 
                 contact = :contact 
                 WHERE id = :id";
        
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':specialty', $specialty);
        $statement->bindParam(':join_date', $join_date);
        $statement->bindParam(':contact', $contact);
        
        return $statement->execute();
    }

    public function deleteBaker($id)
    {
        $query = "DELETE FROM bakers WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        
        return $statement->execute();
    }
}

?>