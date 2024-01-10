<?php
   class Article {

  private $id;
  private $title ;
  private $description ;
  private $clientId;
  private $insurerId;
  private $pdo;

public function __construct($id,$title ,$description,$clientId,$insurerId){
       $this->id = $id;
       $this->title=$title;
       $this->description= $description;
       $this->$clientId=$clientId;
       $this->insurerId=$insurerId;


 

   }
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }
    public function getClientId(){
        return $this->clientId;
    }

    public function getInsurerId(){
        return $this->insurerId;
    }



    public function setId($id){
        return $this->id = $id;
    }
    public function setTitle($title){
        return $this->title = $title;
    }

    public function setDescription($description){
        return $this->description =$description;
    }
    public function setClientId($clientId){
        return $this->clientId= $clientId;
    }

    public function setInsurerId($insurerId){
        return $this->insurerId = $insurerId;
    }
   }

?>