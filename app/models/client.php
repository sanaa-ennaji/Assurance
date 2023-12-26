<?php
require 'db.php';
class Client
{

    private $id;
    private $fullName;
    private $CIN;
    private $address;
    private $email;
    private $phone;
    private $pdo;

    public function __construct($id, $fullName, $CIN, $adress, $phone, $email)
    {

        $this->id = $id;
        $this->fullName = $fullName;
        $this->CIN = $CIN;
        $this->adress = $adress;
        $this->phone = $phone;
        $this->email = $email;


        $database = Database::getInstance();
        $this->pdo = $database->getConnection();

    }
    public function getId(){
        return $this->id;
    }

    public function getFullname(){
        return $this->fullName;
    }
    public function getCIN(){
        return $this->CIN;
    }
    
    public function getAdress(){
        return $this->address;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
  



    public function setId(){
        return $this->id;
    }

    public function setFullname(){
        return $this->fullName;
    }
    public function setCIN(){
        return $this->CIN;
    }
    
    public function setAdress(){
        return $this->address;
    }

    public function setEmail(){
        return $this->email;
    }
    public function setPhone(){
        return $this->phone;
    }
    
}







?>