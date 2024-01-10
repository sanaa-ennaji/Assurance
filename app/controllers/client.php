<?php

// require(__DIR__ . "/../models/Client.php");
 require_once "../services/serviceClient.php";
 $database = Database::getInstance();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $service = new ServiceClient($database);

    if ($_POST['action'] == 'addClient') {
        $id = uniqid(mt_rand(), true);
        $fullName = $_POST['fullName'];
        $CIN = $_POST['CIN'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $client = new Client($id, $fullName, $CIN, $address, $phone, $email);
        $service->insert($client);
        header("Location: ../views/client.php");
    } elseif ($_POST['action'] == 'editClient') {
        $id = $_POST['id'];
        $fullName = $_POST['fullName'];
        $CIN = $_POST['CIN'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $client = new Client($id, $fullName, $CIN, $address, $phone, $email);
        $service->edit($client);
        header("Location: ../views/client.php");
    } elseif ($_POST['action'] == 'deleteClient') {
        $id = $_POST['delete_id'];
        $service->delete($id);
        header("Location: ../views/client.php");
    }
} else {
    $service = new ServiceClient($database);
    $clients = $service->display();
}

?>
