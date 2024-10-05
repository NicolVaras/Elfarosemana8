<?php
require 'User.php';
require 'UserController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $controller = new UserController();
    echo $controller->registrarUsuario($nombre, $correo);
}
?>

