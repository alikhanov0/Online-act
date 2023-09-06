<?php

$servername = "localhost"; // Адрес сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$database = "act_final"; // Имя базы данных

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Устанавливаем режим ошибок PDO на исключения
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение к базе данных успешно установлено";

    // Здесь можно выполнять операции с базой данных

} catch(PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}

?>