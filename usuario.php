<?php
class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $contraseña;

    public function __construct($nombre, $email, $contraseña)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contraseña = password_hash($contraseña, PASSWORD_BCRYPT);
    }

    // Método para registrar el usuario en la base de datos
    public function registrar()
    {
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
        $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)";

        // Usar declaraciones preparadas para evitar inyecciones SQL
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $this->nombre, $this->email, $this->contraseña);

        // Ejecutar la consulta y verificar si se insertó correctamente
        if ($stmt->execute()) {
            echo "Registro exitoso.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Cerrar la conexión
        $stmt->close();
        $conn->close();
    }

    // Métodos para acceder y modificar los atributos
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
?>