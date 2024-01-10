<?php

require_once "../services/serviceInsurer.php";

// $database = Database::getInstance();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $service = new ServiceInsurer();

    if ($_POST['action'] == 'addInsurer') {
        $id = uniqid(mt_rand(), true);
        $nom = $_POST['nom'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        $insurer = new Insurer($id, $nom, $address, $email, $phone);
        $service->insert($insurer);
        header("Location: ../views/insurer.php");
    } elseif ($_POST['action'] == 'editInsurer') {
        $id = $_POST['id'];
        $nom = $_POST['nom'];  
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $insurer = new Insurer($id, $nom, $address, $phone, $email);
        $service->edit($insurer);
        header("Location: ../views/insurer.php");
    } elseif ($_POST['action'] == 'deleteInsurer') {
        $id = $_POST['delete_id'];
        $service->delete($id);
        header("Location: ../views/insurer.php");
    }
} else {
    $service = new ServiceInsurer();
    $insurers = $service->display();
}



?>