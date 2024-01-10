<?php

// require 'db.php';
class Claim{

private $id;
private $description;
private $articleId;
private $pdo;


public function __construct($id,$description,$articleId){
    
      $this->id=$id;
      $this->description=$description;
      $this->articleId=$articleId;

      // $database = Database::getInstance();
      // $this->pdo = $database->getConnection();

}
   public function getId()
   {
   return $this->id;
   }
   public function getDesctription()
   {
    return $this->description;
   } 
   public function getArticleId()
   {
    return $this->articleId;
   } 



   public function setId($id)
   {
   return $this->id =$id;
   }
   
   public function setDesctription($description)
   {
    return $this->description =$description;
   } 

   public function setArticleId($articleId)
   {
    return $this->articleId =$articleId;
   } 


}


?>