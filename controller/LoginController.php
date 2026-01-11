<?php
require_once 'models/Usuario.php';

class LoginController {
    private $usuario;
    
    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function mostrarLogin() {
        // Si ya está logueado, redirigir a tareas
        if ($this->isLoggedIn()) {
            header('Location: index.php?accion=listarTareas');
            exit();
        }
        include 'views/login_form.php';
    }

    public function procesarLogin() {
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->usuario->login($username, $password)) {
                header('Location: index.php?accion=listarTareas');
                exit();
            } else {
                $mensajeError = "Usuario o contraseña incorrectos";
                include 'views/login_form.php';
            }
        }
    }


    public function mostrarRegistro() {
        include 'views/registro_form.php';
    }

    public function procesarRegistro() {
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if ($this->usuario->registrar($username, $password)) {

            $_SESSION['mensaje_exito'] = "¡Registro exitoso! Ahora puedes iniciar sesión.";
            header('Location: index.php?accion=mostrarLogin');
            exit();
        } else {
            $mensajeError = "Este usuario ya existe";
            include 'views/registro_form.php';
        }
    }
}

    public function logout() {
        $this->usuario->logout();
        header('Location: index.php?accion=mostrarLogin');
        exit();
    }

    public function isLoggedIn() {
        return $this->usuario->isLoggedIn();
    }
}