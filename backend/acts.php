<?php

include 'connect.php';

$value = $_POST['value'];

try {
    $sql = "SELECT * FROM `act_types` WHERE `category_id` = :value";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value', $value, PDO::PARAM_STR);
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