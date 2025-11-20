<?php
require_once 'models/Usuario.php';

class LoginController {
    private $usuario;
    
    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function mostrarLogin() {
        include 'views/login_form.php';
    }

    public function procesarLogin() {
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if ($this->usuario->login($username, $password)) {
                // Login exitoso - redirigir al gestor de tareas
                header('Location: index.php?action=listarTareas');
                exit();
            } else {
                // Login fallido - mostrar error
                $error = "Usuario o contraseña incorrectos";
                include 'views/login_form.php';
            }
        }
    }

    public function logout() {
        $this->usuario->logout();
        header('Location: index.php?action=mostrarLogin');
        exit();
    }

    public function isLoggedIn() {
        return $this->usuario->isLoggedIn();
    }

}