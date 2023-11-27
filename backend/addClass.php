<?php

include 'connect.php';

$classNumber = $_POST['classNumber'];
$classLetter = $_POST['classLetter'];
$shanyrak_id = $_POST['shanyrak_id'];

try {
    $sql = "INSERT INTO `classes`(`grade`, `liter`, `shanyrak_id`) VALUES (:classNumber, :classLetter, :shanyrak_id)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':classNumber', $classNumber, PDO::PARAM_INT);
    $stmt->bindParam(':classLetter', $classLetter, PDO::PARAM_STR);
    $stmt->bindParam(':shanyrak_id', $shanyrak_id, PDO::PARAM_STR);
    $stmt->execute();

    $response = array('success' => 'Class added successfully');
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    $response = array('error' => 'Connection error: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

?>
