<?php
include 'connect.php';;

$student = $_POST['student_id'];

try {
    $sql = "SELECT `user_id` FROM `students` WHERE `id` = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $student, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Преобразовываем результат в JSON для передачи на клиентскую сторону
    header('Content-Type: application/json');
    echo json_encode($result);

} catch (PDOException $e) {
    header("HTTP/1.1 500 Internal Server Error");
    $response = array('error' => $e->getMessage());
    echo json_encode($response);
}
?>
