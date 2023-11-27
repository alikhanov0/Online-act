<?php

include 'connect.php';

$shanyrakId = $_POST['shanyrak_id'];
$userId = $_POST['curator_id'];

try {
    // Получение curator_id из таблицы curators с использованием user_id
    $stmt = $conn->prepare("SELECT id FROM curators WHERE user_id = :userId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $curator = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($curator) {
        $curatorId = $curator['id'];

        // Подготовленный запрос для обновления записи в таблице shanyrak
        $sql = "UPDATE shanyrak SET curator_id = :curatorId WHERE id = :shanyrakId";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':curatorId', $curatorId, PDO::PARAM_INT);
        $stmt->bindParam(':shanyrakId', $shanyrakId, PDO::PARAM_INT);

        $stmt->execute();

        $response = array('success' => 'Shanyrak curator updated successfully');
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
