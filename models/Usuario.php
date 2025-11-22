<?php
require_once 'session.php';

class Usuario {
    private $session;
    
    public function __construct() {
        $this->session = new Session();
    }

    public function login($username, $password) {
        if ($username === 'rus' && $password === '1234') {
            $this->session->set('usuario', $username);
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        if($this->session->get('usuario') !== null){
            return true;
        }else{
            return false;
        };
    }

    public function logout(){
        $this->session->destroySession();
    }
}