<?php

include 'connect.php';

$student = $_POST['student'];
$user = $_POST['user']; 
$points = $_POST['points'];

try {
    $sql = "INSERT INTO `history`(`user_id`, `student_id`, `isAct`, `points`) VALUES (:user, :student, 0 , :points)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $user, PDO::PARAM_INT);
    $stmt->bindParam(':student', $student, PDO::PARAM_INT);
    $stmt->bindParam(':points', $points, PDO::PARAM_INT);
    $stmt->execute();

   
    // Обновляем рейтинг
    $sql = "UPDATE rating SET rating = rating - :points WHERE group_id = (SELECT c.shanyrak_id FROM students s JOIN classes c ON s.class_id = c.id WHERE s.id = :student)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':points', $points, PDO::PARAM_INT);
    $stmt->bindParam(':student', $student, PDO::PARAM_INT);
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