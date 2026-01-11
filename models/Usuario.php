<?php
require_once 'session.php';
require_once 'config/dataBase.php';

class Usuario {
    private $session;
    private $db;
    
    public function __construct() {
        $this->session = new Session();
        $this->db = new Database();
    }

    public function login($username, $password) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $usuario = $stmt->fetch();
        
        // Verificar contraseña 
        if ($usuario && password_verify($password, $usuario["password"])) {
            $this->session->set('usuario_id', $usuario['id']);
            $this->session->set('usuario_nombre', $usuario['nombre']);
            return true;
        }
        return false;
    }

    public function registrar($username, $password) {
        $conn = $this->db->getConnection();
        
        // si existe el usuario
        $sql = "SELECT id FROM usuarios WHERE nombre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        
        if ($stmt->fetch()) {
            return false;
        }
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute([$username, $hash]);
    }

    public function isLoggedIn() {
        return $this->session->get('usuario_id') !== null;
    }

    public function logout(){
        $this->session->destroySession();
    }
}