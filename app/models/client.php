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
    
    public function getAddress(){
        return $this->address;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
  



    public function setId($id){
        return $this->id = $id;
    }

    public function setFullname($fullName){
        return $this->fullName =$fullName;
    }
    public function setCIN($CIN){
        return $this->CIN =$CIN;
    }
    
    public function setAdress($address){
        return $this->address =$address;
    }

    public function setEmail($email){
        return $this->email =$email;
    }
    public function setPhone($phone){
        return $this->phone =$phone;
    }
    
}







?>