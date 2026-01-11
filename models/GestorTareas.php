<?php
require_once 'config/dataBase.php';

class GestorTareas {
    private $db;
    private $usuario_id;
    
    public function __construct() {
        $this->db = new Database();
        
        if (isset($_SESSION['usuario_id'])) {
            $this->usuario_id = $_SESSION['usuario_id'];
        } else {
            $this->usuario_id = null;
        }    
    }
    
    public function agregarTarea($tarea) {
        $conn = $this->db->getConnection();
        
        $sql = "INSERT INTO tareas (nombre, descripcion, prioridad, fecha_limite, usuario_id) 
                VALUES (:nombre, :descripcion, :prioridad, :fecha_limite, :usuario_id)";
        
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute([
            ':nombre' => $tarea->getNombre(),
            ':descripcion' => $tarea->getDescripcion(),
            ':prioridad' => $tarea->getPrioridad(),
            ':fecha_limite' => $tarea->getFechaLimite(),
            ':usuario_id' => $this->usuario_id
        ]);
    }
    
    public function obtenerTareas() {
        if (!$this->usuario_id) {
            return [];
        }
        
        $conn = $this->db->getConnection();
        
        $sql = "SELECT * FROM tareas WHERE usuario_id = :usuario_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':usuario_id' => $this->usuario_id]);
        
        $tareasData = $stmt->fetchAll();
        
        // Convertir a objetos Tarea
        $tareas = [];
        foreach ($tareasData as $tareaData) {
            $tarea = new Tarea(
                $tareaData['nombre'],
                $tareaData['descripcion'],
                $tareaData['prioridad'],
                $tareaData['fecha_limite'],
                $tareaData['id'],
                $tareaData['usuario_id']
            );
            $tareas[$tareaData['id']] = $tarea;
        }
        
        return $tareas;
    }
    
    public function eliminarTarea($id) {
        if (!$this->usuario_id) {
            return false;
        }
        
        $conn = $this->db->getConnection();
        
        $sql = "DELETE FROM tareas WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute([
            ':id' => $id,
            ':usuario_id' => $this->usuario_id
        ]);
    }
    
    public function actualizarTarea($id, $nuevosDatos) {
        if (!$this->usuario_id) {
            return false;
        }
        
        $conn = $this->db->getConnection();
        
        $sql = "UPDATE tareas SET 
                nombre = :nombre, 
                descripcion = :descripcion, 
                prioridad = :prioridad, 
                fecha_limite = :fecha_limite 
                WHERE id = :id AND usuario_id = :usuario_id";
        
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute([
            ':nombre' => $nuevosDatos['nombre'],
            ':descripcion' => $nuevosDatos['descripcion'],
            ':prioridad' => $nuevosDatos['prioridad'],
            ':fecha_limite' => $nuevosDatos['fechaLimite'],
            ':id' => $id,
            ':usuario_id' => $this->usuario_id
        ]);
    }
    
    public function obtenerTareaPorId($id) {
        if (!$this->usuario_id) {
            return null;
        }
        
        $conn = $this->db->getConnection();
        
        $sql = "SELECT * FROM tareas WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':usuario_id' => $this->usuario_id
        ]);
        
        $tareaData = $stmt->fetch();
        
        if ($tareaData) {
            return new Tarea(
                $tareaData['nombre'],
                $tareaData['descripcion'],
                $tareaData['prioridad'],
                $tareaData['fecha_limite'],
                $tareaData['id'],
                $tareaData['usuario_id']
            );
        }
        
        return null;
    }
}