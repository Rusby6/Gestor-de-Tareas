-- phpMyAdmin SQL Dump
-- Proyecto: Gestor de Tareas en PHP
-- Base de datos: gestortareas

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

-- --------------------------------------------------------
-- Crear base de datos
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS gestortareas
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE gestortareas;

-- --------------------------------------------------------
-- Tabla usuarios
-- --------------------------------------------------------

CREATE TABLE usuarios (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY nombre_unico (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Tabla tareas
-- --------------------------------------------------------

CREATE TABLE tareas (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  descripcion TEXT DEFAULT NULL,
  prioridad ENUM('baja','media','alta') NOT NULL DEFAULT 'baja',
  fecha_limite DATE NOT NULL,
  usuario_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_tareas_usuario (usuario_id),
  CONSTRAINT fk_tareas_usuario
    FOREIGN KEY (usuario_id)
    REFERENCES usuarios (id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
