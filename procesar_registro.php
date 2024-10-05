<?php
// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

// Conectar a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>