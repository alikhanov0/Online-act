<?php

include 'connect.php';

$grade = $_POST['grade'];
$letter = $_POST['liter'];

try {
    $sql = "SELECT u.first_name, u.last_name, s.id AS student_id
    FROM users u
    JOIN students s ON u.id = s.user_id
    JOIN classes c ON s.class_id = c.id
    WHERE c.grade = :grade AND c.liter = :letter;
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':grade', $grade, PDO::PARAM_STR);
    $stmt->bindParam(':letter', $letter, PDO::PARAM_STR);
    $stmt->execute();

    // Получите данные из базы данных в виде массива
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Верните данные в виде JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    // Логируем ошибку
    error_log("Ошибка при выполнении запроса: " . $e->getMessage(), 0);
    
    // Возвращаем JSON-ответ с информацией об ошибке
    $response = array('error' => 'Connection error');
    echo json_encode($response);
    exit;
}

?>