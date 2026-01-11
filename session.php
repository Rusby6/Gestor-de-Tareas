<?php
class Session {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($clave, $valor) {
        $_SESSION[$clave] = $valor;
    }
    
    public function get($clave) {
        return $_SESSION[$clave] ?? null;
    }
    
    public function delete($clave) {
        unset($_SESSION[$clave]);
    }

    public function destroySession() {
        session_destroy();
    }
}