<?php
@include "../config/config.php";

$connection = connect($db_username, $db_password);
$result = query($connection);
returnResult($result);


function connect($username, $password) {
    $conn = new mysqli("localhost", $username, $password, "exercici1");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function query($conn) {
    $stmt = $conn->prepare("select * from usuaris where edat < 25");
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    return $rows;
}

function returnResult($result) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result);
}
