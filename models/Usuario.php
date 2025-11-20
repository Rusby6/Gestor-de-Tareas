<?php
require_once 'session.php';

class Usuario {
    private $session;
    
    public function __construct() {
        $this->session = new Session();
    }

    public function login($username, $password) {
        if ($username === 'ruslan' && $password === '1234') {
            // 2. Si son correctas, crear sesión
            $this->session->set('usuario', $username);
            $this->session->set('logged_in', true);
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        $loggedIn = $this->session->get('logged_in');
        return $loggedIn === true;
    }

    public function logout(){
        $this->session->destroySession();
    }
    
    public function getUsuario(){
        return $this->session->get('usuario');
    }
}