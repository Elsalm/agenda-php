<?php
require("conexion.php");
require("clases/contacto.php");
function obtenerListaContactos($id, $nombre)
{
    $conn = connect();
    $nombre = isset($nombre) ? $nombre : null;
    $query = "SELECT * FROM contactos WHERE id_usuario LIKE $id";
    if ($nombre !== null) {
        $query = $query . " AND nombre LIKE '%$nombre%'";
    }
    $res = $conn->query($query);
    if ($res->num_rows > 0) {
        $contactos = array();
        while ($fila = $res->fetch_assoc()) {
            $contactos[] = new contacto($fila["id"], $fila["nombre"], $fila["apellido"], $fila["telefono"], $fila["id_usuario"], $fila["foto"]);
        }
        $conn->close();
        return $contactos;
    } else {
        echo "<h3>opss, ah ocurrido un error</h3>";
    }
}

function pintarContactos($contactos)
{
    foreach ($contactos as $contacto) {
        echo "<a href='mensajesContacto.php?id={$contacto->getId()}'>";       
        echo "<img src='{$contacto->getFoto()}'/>";
        echo "<h3>id:{$contacto->getId()}</h3>";
        echo "<h3>Nombre:{$contacto->getNombre()}</h3>";
        echo "<h3>Apellido:{$contacto->getApellido()}</h3>";
        echo "<h3>Numero Telefono:{$contacto->getNumero()}</h3>";
        echo "</a>";
    }
}

function crearContato($nombre, $apellido, $numero, $foto, $idUsuario)
{
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO contactos (nombre, apellido, telefono, foto, id_usuario) values(?,?,?,?,?)");
    $stmt->bind_param("ssisi", $nombre, $apellido, $numero, $foto, $idUsuario);
    $stmt->execute();
    $conn->close();
}


function fotoDealer($dir, $nm, $formato)
{
    if ($formato != "png" && $formato != "jpg" && $formato != "svg") {
        echo "<h3>formato de imagen incorrecto prueba con (png, jpg, svg)</h3>";
    }
    else{
        $newDir = "img/" . $nm . "_foto.$formato";
        move_uploaded_file($dir, $newDir);
        return $newDir;
    }
    if (empty($dir)) {
        return "img/default_foto.png";
    }}
