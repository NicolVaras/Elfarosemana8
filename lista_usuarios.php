<?php
// Conectar a la base de datos (reemplaza con tus datos)
$servername = "nikky";
$username = "root";
$password = "Abby1623.";
$dbname = "Elfaro_semana7";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los usuarios
$sql = "SELECT id, nombre, email FROM usuarios";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Usuarios Registrados</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["email"] . "</td></tr>";
                }
            } else {
                echo "0 resultados";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>