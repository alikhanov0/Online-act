<?php
include 'connect.php';

session_start();

$email = $_POST["email"];

try {
    $sql = "SELECT * FROM `users` WHERE `username` = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $email, PDO::PARAM_STR);
    $stmt->execute();


    if ($stmt->rowCount() == 1) {
        $_SESSION['loggedIn'] = true;
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $response = array('success' => true);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['role'] = $user['role'];

        header("Content-Type: application/json");
        echo json_encode($response);
        exit;
    } else {
        $response = array('success' => false);
        
        header("Content-Type: application/json");
        echo json_encode($response);
        exit;
    }
} catch (PDOException $e) {
    error_log("Ошибка при выполнении запроса: " . $e->getMessage(), 0);
    
    $response = array('error' => 'Connection error');
    echo json_encode($response);
    exit;
}
?>