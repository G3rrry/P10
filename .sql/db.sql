-- SQL script para crear la base de datos y la tabla 'libros' sin datos iniciales

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS libreria;

-- Usar la base de datos
USE libreria;

-- Crear la tabla 'libros'
CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    autor VARCHAR(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    fecha_publicacion DATE,
    imagen_portada MEDIUMBLOB
);