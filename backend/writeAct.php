<?php

include 'connect.php';

$student = $_POST['student'];
$act = $_POST['act'];
$user = $_POST['user']; 

try {
    $sql = "INSERT INTO `acts_history`(`student_id`, `user_id`, `act_type_id`) VALUES (:student,:user,:act)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student', $student, PDO::PARAM_INT);
    $stmt->bindParam(':user', $user, PDO::PARAM_INT);
    $stmt->bindParam(':act', $act, PDO::PARAM_INT);
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