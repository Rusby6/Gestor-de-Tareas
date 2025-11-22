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
                header('Location: index.php?accion=listarTareas');
                exit();
            } else {
                $mensajeError = "Usuario o contraseña incorrectos";
                include 'views/login_form.php';
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