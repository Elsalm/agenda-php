<?php
require("Services/lista.php");
require("clases/usuario.php");
session_start();
$currentUser = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>

<body>
    <h2>Lista de contactos</h2>
    <button type="button" onclick="document.getElementById('miDialog').showModal();">añadir contacto</button>
    <dialog id="miDialog">
        <form action="?" method="post" enctype="multipart/form-data">
            <legend>Añadir Contacto</legend>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido">
            <label for="telefono">Telefono</label>
            <input type="number" name="telefono">
            <label for="Foto">Foto de contacto</label>
            <input type="file" name="foto" id="foto">
            <button type="submit" value="enviado" name="enviado">añadir</button>
        </form>
        <button type="button" onclick="document.getElementById('miDialog').close();">salir</button>
    </dialog>
    <form action="?" method="get">
        <legend>buscar contacto</legend>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <button type="submit">Buscar Nombre</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $nombreBusqueda = $_GET["nombre"];
    }
    $contactos = obtenerListaContactos($currentUser->getID(), $nombreBusqueda);
    pintarContactos($contactos);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $numero = $_POST["telefono"];
        $enviado = $_POST["enviado"];
        $foto = $_FILES["foto"]["name"];
        $fototmp = $_FILES["foto"]["tmp_name"];
        $formato = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
        if ($enviado == "enviado") {
        $img = fotoDealer($fototmp, $nombre, $formato);
        crearContato($nombre, $apellido, $numero, $img, $currentUser->getID());
        }
    }
    ?>
    <a href=""></a>
</body>

</html>