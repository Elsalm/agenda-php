<?php
require_once("conexion.php");
require_once("clases/usuario.php");
function loggin($numero, $password)
{
    $conn = connect();

    $consulta = $conn->prepare("SELECT * FROM usuarios WHERE numero = ?");
    $consulta->bind_param("i", $numero);
    $consulta->execute();
    $resultado = $consulta->get_result();
    if ($resultado->num_rows == 0) {
        echo "<h3>El usuario no existe</h3>";
    $conn->close();
        return false;
    } else {
        $fila = $resultado->fetch_assoc();
        $usuario = new Usuario($fila["id"], $fila["numero"], $fila["password"], $fila["avatar"]);
        if ($usuario->getPassword() == $password) {
            echo "<h3>contraseña correcta</h3>";
            session_start();
            $_SESSION["usuario"] = $usuario;
    $conn->close();
            return true;
        } else {
            echo "<h3>contraseña  incorrecta</h3>";
    $conn->close();
            return false;
        }
    }
}
