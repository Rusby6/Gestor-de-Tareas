<?php
require_once 'session.php';

class Usuario {
    private $session;
    
    public function __construct() {
        $this->session = new Session();
    }

    public function login($username, $password) {
        if ($username === 'ruslan' && $password === '1234') {
            $this->session->set('usuario', $username);
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        return $this->session->get('usuario') !== null;
    }

    public function logout(){
        $this->session->destroySession();
    }
}