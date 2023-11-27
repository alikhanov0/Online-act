<?php

include 'connect.php';

$student = $_POST['student_id'];
$grade = $_POST['grade'];
$liter = $_POST['liter'];

try {
    $sql = "SELECT `id` FROM `classes` WHERE `grade` = :grade AND `liter` = :liter";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':grade', $grade, PDO::PARAM_INT);
    $stmt->bindParam(':liter', $liter, PDO::PARAM_STR);
    $stmt->execute();

    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $res['id'];



    $sql = "UPDATE `students` SET `class_id` = :id WHERE `id` = :student";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':student', $student, PDO::PARAM_INT);
    $stmt->execute();
    
    
    $response = array('success' => 'Data updated successfully');
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    // Логируем ошибку
    error_log("Ошибка при выполнении запроса: " . $e->getMessage(), 0);
    
    // Возвращаем JSON-ответ с информацией об ошибке
    $response = array('error' => 'Connection error');
    echo json_encode($response);
    exit;
}

?>