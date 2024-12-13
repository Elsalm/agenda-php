<?php
require_once("clases/usuario.php");
require_once("Services/detalleContactoService.php");
session_start();
$currentUser = $_SESSION["usuario"];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
        $_SESSION["idContacto"] = $id;
    }
        $mensajes = verMensajes($_SESSION["idContacto"], $currentUser->getId());
    ?>
    <?php
    foreach ($mensajes as $mensaje):
    ?>
        <div>
            <p><?= $mensaje->getMensaje() ?></p>
            <p><?= $mensaje->getFecha() ?></p>
        </div>
    <?php
    endforeach;
    ?>
    <form action="?" method="post">
        <input type="text" name="mensaje">
        <button type="submit">enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mensajeAEnviar = $_POST["mensaje"];
        enviarMensaje($_SESSION["idContacto"],$mensajeAEnviar);
    }
    ?>
</body>

</html>