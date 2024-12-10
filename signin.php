<?php
require_once("Services/userServices.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="numero">numero de usuario</label>
        <input type="text" name="numero">
        <label for="contrasena">contraseña</label>
        <input type="text" name="contrasena">
        <label for="imagen">avatar</label>
        <input type="file" name="imagen" id="imagen">
        <button type="submit">registrar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $password = $_POST["contrasena"];
        $img = $_FILES["imagen"];
        $dirTmp = $_FILES["imagen"]["tmp_name"];
        $avatar = avatarDealer($img, $dirTmp, $numero);
        signin($numero, $password, $avatar);
    }
    ?>
</body>

</html>