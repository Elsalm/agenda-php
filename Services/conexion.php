<?php
function connect()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $bd = "agenda";
    $conn = new mysqli($serverName, $userName, $password, $bd);

    if ($conn->connect_error) {
        die("conexion fallida" . $conn->connect_error);
    } else {
        return $conn;
    }
}
