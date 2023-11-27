<?php

include 'connect.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$login = $_POST['login'];
$pass = $_POST['pass'];

try {
    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES (:name, :surname, :login, :pass, 2)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();


    $response = array('success' => 'Data inserted successfully');
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    $response = array('error' => 'Connection error: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

?>