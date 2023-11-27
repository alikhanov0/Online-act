<?php

include 'connect.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$grade = $_POST['grade'];
$liter = $_POST['liter'];

try {
    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES (:name, :surname, :login, :pass, 0)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();
    // user добавлен

    $sql = "SELECT `id` FROM `users` WHERE `first_name` = :name AND `last_name` = :surname AND `username` = :login AND `password` = :pass AND `role` = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];

    $sql = "SELECT `id` FROM `classes` WHERE `grade` = :grade AND `liter` = :liter";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':grade', $grade, PDO::PARAM_INT);
    $stmt->bindParam(':liter', $liter, PDO::PARAM_STR);
    $stmt->execute();

    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $class = $res['id'];
    // Выбрали class_id

    $sql = "INSERT INTO `students`(`user_id`, `class_id`) VALUES (:user, :class)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $id, PDO::PARAM_INT);
    $stmt->bindParam(':class', $class, PDO::PARAM_INT);
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