<?php

require '../models/db.php';
require '../models/article.php';
require 'IserviceArticle.php';



class ArticleService implements IserviceArticle {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function insert(Article $article) {
        $pdo = $this->db->getConnection();

        $id = $article->getId();
        $title = $article->getTitle();
        $description = $article->getDescription();
        $clientId = $article->getClientId();
        $insurerId = $article->getInsurerId();

        $sql = "INSERT INTO article VALUES (:id, :title, :description, :clientId, :insurerId)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":clientId", $clientId);
        $stmt->bindParam(":insurerId", $insurerId);
        $stmt->execute();
    }

    public function edit(Article $article) {
        $pdo = $this->db->getConnection();

        $id = $article->getId();
        $title = $article->getTitle();
        $description = $article->getDescription();
        $clientId = $article->getClientId();
        $insurerId = $article->getInsurerId();

        $sql = "UPDATE article SET title = :title, description = :description, clientId = :clientId, insurerId = :insurerId WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":clientId", $clientId);
        $stmt->bindParam(":insurerId", $insurerId);
        $stmt->execute();
    }

    public function delete($id) {
        $pdo = $this->db->getConnection();
        $sql = "DELETE FROM article WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function display() {
        $pdo = $this->db->getConnection();
        $sql = "SELECT * FROM article";
        $data = $pdo->query($sql);
        $articles = $data->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }

    public function search($query) {
        $pdo = $this->db->getConnection();
        $sql = "SELECT * FROM article WHERE title LIKE :query OR description LIKE :query";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':query', '%' . $query . '%');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

?>
