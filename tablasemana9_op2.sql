-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS tu_base_de_datos;

-- Usar la base de datos creada
USE tu_base_de_datos;

-- Crear tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Crear tabla categoria
CREATE TABLE IF NOT EXISTS categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

-- Crear tabla articulo
CREATE TABLE IF NOT EXISTS articulo (
    id_articulo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(45) NOT NULL,
    contenido TEXT NOT NULL,
    fecha_publicacion DATE NOT NULL,
    id_autor INT NOT NULL,
    FOREIGN KEY (id_autor) REFERENCES usuarios(id)
);

-- Crear tabla comentario_articulo
CREATE TABLE IF NOT EXISTS comentario_articulo (
    id_comentario_articulo INT AUTO_INCREMENT PRIMARY KEY,
    id_articulo INT NOT NULL,
    id_usuario INT NOT NULL,
    contenido TEXT NOT NULL,
    fecha_comentario DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_articulo) REFERENCES articulo(id_articulo),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Crear tabla contacto
CREATE TABLE IF NOT EXISTS contacto (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,  -- Puede ser nulo si el contacto es anónimo
    mensaje TEXT NOT NULL,
    fecha_contacto DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Procedimiento almacenado para insertar un usuario
DELIMITER //
CREATE PROCEDURE InsertUsuario(IN nombre VARCHAR(100), IN email VARCHAR(100), IN contraseña VARCHAR(255))
BEGIN
    INSERT INTO usuarios (nombre, email, contraseña) VALUES (nombre, email, contraseña);
END //
DELIMITER ;

-- Procedimiento almacenado para obtener todos los usuarios
DELIMITER //
CREATE PROCEDURE GetUsuarios()
BEGIN
    SELECT * FROM usuarios;
END //
DELIMITER ;

-- Procedimiento almacenado para insertar un mensaje de contacto
DELIMITER //
CREATE PROCEDURE InsertContacto(IN id_usuario INT, IN mensaje TEXT)
BEGIN
    INSERT INTO contacto (id_usuario, mensaje) VALUES (id_usuario, mensaje);
END //
DELIMITER ;

-- Asegurarse de que las restricciones de clave foránea y chequeos únicos estén habilitados
SET FOREIGN_KEY_CHECKS = 1;
SET UNIQUE_CHECKS = 1;