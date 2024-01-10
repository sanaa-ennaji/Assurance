<?php


require '../models/db.php';
require '../models/insurer.php';
require 'Iserviceinserur.php';
class ServiceInsurer implements Iserviceinserur
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function insert(insurer $insurer)
    {
        $pdo = $this->db->getConnection();

        $id = $insurer->getId();
        $nom = $insurer->getNom();
        $address = $insurer->getAddress();
        $email = $insurer->getEmail();
        $phone = $insurer->getPhone();


        $sql = "INSERT INTO inserur VALUES (:id ,:nom , :address ,:email ,:phone)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->execute();
    }

    public function edit(Insurer $insurer)
    {
        $pdo = $this->db->getConnection();

        $id = $insurer->getId();
        $nom = $insurer->getNom();
        $address = $insurer->getAddress();
        $email = $insurer->getEmail();
        $phone = $insurer->getPhone();
        $sql = "UPDATE insurer SET nom =:nom , address = :address ,email=:email ,phone = :phone  WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->execute();
    }
    public function delete($id)
    {
        $pdo = $this->db->getConnection();
        $sql = "DELETE FROM insurer WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    


    public function display()
    {
        $pdo = $this->db->getConnection();
        $sql = "SELECT * FROM insurer";
        $data = $pdo->query($sql);
        $insurer = $data->fetchAll(PDO::FETCH_ASSOC);
        return $insurer;
    }

    public function search($query)
    {
        $pdo = $this->db->getConnection();
        $sql = " SELECT * FROM insurer WHERE nom LIKE :query  OR address LIKE :query OR phone LIKE :query OR email LIKE :query";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('query', '%' . $query . '%');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

?>