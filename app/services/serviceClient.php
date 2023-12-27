<?php 

// Composition (Dependency Injection):
  require '../models/db.php';
  require '../models/client.php';
  require 'Iserviceclient.php';
  class ServiceClient implements IServiceClient {

    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function insert(Client $client) {
        $pdo = $this->database->getConnection();

        $id = $client->getId();
        $fullName = $client->getFullName();
        $CIN = $client->getCIN();
        $address = $client->getAddress();
        $phone = $client->getPhone();
        $email = $client->getEmail();

        $sql = "INSERT INTO client VALUES (:id, :fullName, :CIN, :address, :phone, :email)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":fullName", $fullName);
        $stmt->bindParam(":CIN", $CIN);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":email", $email);

        $stmt->execute();
    }

    public function edit(Client $client) {
        $pdo = $this->database->getConnection();

        $id = $client->getId();
        $fullName = $client->getFullName();
        $CIN = $client->getCIN();
        $address = $client->getAddress();
        $phone = $client->getPhone();
        $email = $client->getEmail();

        $sql = "UPDATE client SET fullName = :fullName, CIN = :CIN, address = :address, phone = :phone, email = :email WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":fullName", $fullName);
        $stmt->bindParam(":CIN", $CIN);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":email", $email);

        $stmt->execute();
    }

    public function delete($id) {
        $pdo = $this->database->getConnection();
        $sql = "DELETE FROM client WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }

    public function display() {
        $pdo = $this->database->getConnection();
        $sql = "SELECT * FROM client";
        $data = $pdo->query($sql);
        $clients = $data->fetchAll(PDO::FETCH_ASSOC);
        return $clients;
    }

    public function search($query) {
        $pdo = $this->database->getConnection();

        $sql = "SELECT * FROM client WHERE fullName LIKE :query OR CIN LIKE :query OR address LIKE :query OR phone LIKE :query OR email LIKE :query";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':query', '%' . $query . '%');
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}

?>