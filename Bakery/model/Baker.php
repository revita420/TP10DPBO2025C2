<?php

class Baker
{
    private $id;
    private $name;
    private $specialty;
    private $join_date;
    private $contact;
    private $created_at;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSpecialty()
    {
        return $this->specialty;
    }

    public function getJoinDate()
    {
        return $this->join_date;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;
    }

    public function setJoinDate($join_date)
    {
        $this->join_date = $join_date;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}

?>