<?php

@include "../config/config.php";

$connection = connect($db_username, $db_password);
$result = getUsers($connection);
$connection->close();
return $result;


function connect($username, $password)
{
    $conn = new \mysqli("localhost", $username, $password, "exercici2");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getUsers($conn)
{
    $stmt = $conn->prepare("select id, nom from usuaris");
    $stmt->execute();
    $result = $stmt->get_result();
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $res = array(
            "id" => $row["id"],
            "nom" => $row["nom"],
        );
        $users[] = $res;
    }
    $result->free();


    $rows = array();
    foreach ($users as $row) {
        $res = array(
            "nom" => $row["nom"],
            "products" => getProducts($conn, $row["id"]),
        );
        $rows[] = $res;
    }
    return $rows;
}

function getProducts($conn, $user_id)
{
    $stmt = $conn->prepare("select producte, preu from comandes where usuari_id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        $result->free();
    }

    return $products;
}
