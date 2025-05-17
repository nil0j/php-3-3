<?php
@include "../config/config.php";

$connection = connect($db_username, $db_password);
$result = query($connection);
returnResult($result);

function connect($username, $password) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=exercici1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function query($conn) {
    $stmt = $conn->prepare("select * from usuaris where edat < 25");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function returnResult($result) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result);
}
