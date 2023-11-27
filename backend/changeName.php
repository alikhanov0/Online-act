<?php
include 'connect.php';;

$user_id = intval($_POST['user_id']);
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

try {
    $response = $user_id;

    $sql = "UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name WHERE id=:id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    
    header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $e) {
    header("HTTP/1.1 500 Internal Server Error");
    $response = array('error' => $e->getMessage());
    echo json_encode($response);
}
?>
