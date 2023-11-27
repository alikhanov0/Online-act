<?php

include 'connect.php';

// Получаем данные из POST-запроса
$shanyrakName = $_POST['shanyrakName'];
$userId = $_POST['curatorId'];

try {
    // Сначала получаем curator_id из таблицы curators с использованием user_id
    $stmt = $conn->prepare("SELECT id FROM curators WHERE user_id = :userId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $curator = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($curator) {
        $curatorId = $curator['id'];

        // Подготовленный запрос для добавления новой записи в таблицу shanyrak
        $sql = "INSERT INTO `shanyrak`(`shanyrak_name`, `curator_id`) VALUES (:shanyrakName, :curatorId)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':shanyrakName', $shanyrakName, PDO::PARAM_STR);
        $stmt->bindParam(':curatorId', $curatorId, PDO::PARAM_INT);

        $stmt->execute();

        $response = array('success' => 'Shanyrak added successfully');
    } else {
        $response = array('error' => 'No curator found with the provided user_id');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    $response = array('error' => 'Connection error: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

?>
