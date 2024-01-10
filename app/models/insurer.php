<?php

// require 'db.php';

class Insurer {
    // Properties
    private $id;
    private $nom;
    private $address;
    private $email;
    private $phone;
    private $pdo;

    
    public function __construct($id, $nom, $address, $email, $phone) {
        $this->id = $id;
        $this->nom = $nom;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;

     


    }
//geters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getaddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setaddress($address) {
        $this->address = $address;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
}


?>





