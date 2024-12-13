<?php
require_once("conexion.php");
function signin($numero, $password, $avatar)
{
    $conn = connect();
    $consulta = $conn->prepare("INSERT INTO usuarios (numero, password, avatar) VALUES (?,?,?)");
    $consulta->bind_param("iss", $numero, $password, $avatar);
    $consulta->execute();
}

function avatarDealer($dir, $nm, $formato)
{
    if ($formato != "png" || $formato != "jpg" || $formato != "svg") {
        echo "<h3>formato de imagen incorrecto prueba con (png, jpg, svg)</h3>";
    } else {
        $newDir = "img/" . $nm . "_avatar.$formato";
        move_uploaded_file($dir, $newDir);
        return $newDir;
    }
    if (empty($dir)) {
        return "img/default_avatar.png";
    }
}
