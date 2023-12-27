<?php
// require_once "../models/client.php"; // Include or require the client.php file only once
require_once "../services/serviceClient.php";
// require "../models/db.php";

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

        echo json_encode(['status' => 'success']);
        exit();
    } elseif ($_POST['action'] == 'editClient') {
        $id = $_POST['id'];
        $fullName = $_POST['fullName'];
        $CIN = $_POST['CIN'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $client = new Client($id, $fullName, $CIN, $address, $phone, $email);

        $service->edit($client);

        echo json_encode(['status' => 'success']);
        exit();
    } elseif ($_POST['action'] == 'deleteClient') {
        $id = $_POST['delete_id'];

        $service->delete($id);

        echo json_encode(['status' => 'success']);
        exit();
    }
}

$service = new ServiceClient($database);
$clients = $service->display();
echo json_encode($clients);
var_dump($clients);
?>
