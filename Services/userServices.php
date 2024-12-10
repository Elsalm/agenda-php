<?php
require_once("conexion.php");
require_once("clases/usuario.php");
function loggin($numero, $password)
{
    $conn = connect();

    $consulta = $conn->prepare("SELECT * FROM usuario WHERE numero = ?");
    $consulta->bind_param("i", $numero);
    $consulta->execute();
    $resultado = $consulta->get_result();
    if ($resultado->num_rows == 0) {
        echo "<h3>El usuario no existe</h3>";
        return false;
    } else {
        $fila = $resultado->fetch_assoc();
        $usuario = new Usuario($fila["numero"], $fila["password"], $fila["avatar"]);
        if ($usuario->getPassword() == $password) {
            echo "<h3>contraseña correcta</h3>";
            session_start();
            $_SESSION["usuario"] = $usuario;
            return true;
        } else {
            echo "<h3>contraseña  incorrecta</h3>";
            return false;
        }
    }
    $conn->close();
}

function signin($numero, $password, $avatar)
{
    $conn = connect();
    $consulta = $conn->prepare("INSERT INTO usuario (numero, password, avatar) VALUES (?,?,?)");
    $consulta->bind_param("iss", $numero, $password, $avatar);
    $consulta->execute();
}

function avatarDealer($img, $dir, $nm){
    if (empty($dir)) {
        return "img/default_avatar.png";
    }
    else{
        $newDir = "img/".$nm."_avatar.png";
          move_uploaded_file($dir,$newDir);
            return $newDir;
    }

}