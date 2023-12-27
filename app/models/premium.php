<?php

require 'db.php';



class Premium
{

    private $id;
    private $amount;
    private $claimId;
    private $pdo;



    public function __construct($id, $amount, $claimId)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->claimId = $claimId;


        $database = Database::getInstance();
        $this->pdo = $database::getConnection();


    }

    public function getId()
    {
        return $this->id;
    }

    public function getAmount()
    {
        return $this->id;
    }

    public function getClaimId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        return $this->id =$id;
    }

    public function setAmount($amount)
    {
        return $this->amount =$amount;
    }

    public function setClaimId($claimId)
    {
        return $this->claimId=$claimId;
    }



}







?>