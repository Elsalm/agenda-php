<?php
require_once("Services/userServices.php");
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar session</title>
</head>

<body>
    <form action="#" method="post">
        <label for="numero">numero de telefono:</label>
        <input type="text" name="numero">
        <label for="password">contraseña:</label>
        <input type="text" name="password">
        <button type="submit">loggin</button>
    </form>
    <a href="signin.php"><button>resgistrarse</button></a>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $contrasena = $_POST["password"];
        if (loggin($numero, $contrasena)) {
            header("location: listaContacto.php");
        }
    }
    ?>
</body>

</html>