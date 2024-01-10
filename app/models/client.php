<?php

// namespace app\modeles;
class Client
{

    private $id;
    private $fullName;
    private $CIN;
    private $address;
    private $email;
    private $phone;
    private $pdo;

    public function __construct($id, $fullName, $CIN, $address, $phone, $email)
    {

        $this->id = $id;
        $this->fullName = $fullName;
        $this->CIN = $CIN;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;


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
    
    public function getaddress(){
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
    
    public function setAddress($address){
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