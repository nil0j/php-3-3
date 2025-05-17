<?php
@include "../config/config.php";
$result = array(
    "mysqli" => @include("../src/mysqli.php"),
    "pdo"    => @include("../src/pdo.php"),
);

returnResult($result);


function returnResult($result)
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result);
}
