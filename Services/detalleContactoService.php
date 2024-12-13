<?php
require_once("conexion.php");
require_once("clases/mensajes.php");
function verMensajes($id, $idUsuario)
{
    $query = "SELECT * FROM mensajes INNER JOIN contactos ON mensajes.id_contacto = contactos.id WHERE mensajes.id_contacto = ? and contactos.id_usuario = ?";
    $conn = connect();
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id, $idUsuario);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        $mensajes = array();
        while ($fila = $res->fetch_assoc()) {
            $mensajes[] = new mensaje($fila["id"], $fila["id_contacto"], $fila["texto"], $fila["fecha"]);
        }
        return $mensajes;
    } else {
        return false;
    }
}

function enviarMensaje($idContacto, $mensaje){

    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO mensajes(id_contacto, texto) values (?, ?)");
    $stmt->bind_param("is", $idContacto, $mensaje);
    $stmt->execute();
}
