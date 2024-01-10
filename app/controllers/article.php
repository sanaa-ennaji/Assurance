<?php

require_once "../services/serviceArticle.php";
require_once "../services/serviceclient.php";
require_once "../services/serviceinsurer.php";

// $db = Database::getInstance();
$service = new ServiceClient($db);
$service = new ServiceInsurer($db);
$clients = $clientService->display();
$insurers = $insurerService->display();

// $database = Database::getInstance();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $articleService = new ArticleService();

    if ($_POST['action'] == 'addArticle') {
        $id = uniqid(mt_rand(), true);
        $title = $_POST['title'];
        $description = $_POST['description'];
        $clientId = $_POST['clientId'];
        $insurerId = $_POST['insurerId'];

        $article = new Article($id, $title, $description, $clientId, $insurerId);
        $articleService->insert($article);
        header("Location: ../views/article.php");
    } elseif ($_POST['action'] == 'editArticle') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $clientId = $_POST['clientId'];
        $insurerId = $_POST['insurerId'];

        $article = new Article($id, $title, $description, $clientId, $insurerId);
        $articleService->edit($article);
        header("Location: ../views/article.php");
    } elseif ($_POST['action'] == 'deleteArticle') {
        $id = $_POST['delete_id'];
        $articleService->delete($id);
        header("Location: ../views/article.php");
    }
} else {
    $articleService = new ArticleService();
    $articles = $articleService->display();
}

?>
