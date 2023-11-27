<?php
include 'connect.php';

$id = $_POST['id'];
$shanyrakName = $_POST['shanyrakName'];

try {

    $sql = "UPDATE `shanyrak` SET `shanyrak_name` = :shanyrakName WHERE `id`=:id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':shanyrakName', $shanyrakName, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $response = "Success!";
    header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $e) {
    header("HTTP/1.1 500 Internal Server Error");
    $response = array('error' => $e->getMessage());
    echo json_encode($response);
}
?>
