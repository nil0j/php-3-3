<?php

namespace MyDatabase\Pdo;

$connection = connect($db_username, $db_password);
$result = getUsers($connection);
return $result;


function connect($username, $password)
{
    try {
        $conn = new \PDO("mysql:host=localhost;dbname=exercici2", $username, $password);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (\PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function getUsers($conn)
{
    $stmt = $conn->prepare("select id, nom from usuaris");
    $stmt->execute();

    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($result as $user) {
        $res = array(
            "id" => $user["id"],
            "nom" => $user["nom"],
        );
        $users[] = $res;
    }

    $rows = array();
    foreach ($users as $user) {
        $res = array(
            "nom" => $user["nom"],
            "products" => getProducts($conn, $user["id"]),
        );
        $rows[] = $res;
    }
    return $rows;
}

function getProducts($conn, $user_id)
{
    $stmt = $conn->prepare("select producte, preu from comandes where usuari_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    $rows = array();
    foreach ($result as $row) {
        $rows[] = $row;
    }
    return $rows;
}
