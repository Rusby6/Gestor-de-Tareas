<?php
class Tarea {
    private $id;
    private $nombre;
    private $descripcion;
    private $prioridad;
    private $fechaLimite;
    private $usuario_id;
    
    public function __construct($nombre, $descripcion, $prioridad, $fechaLimite, $id = null, $usuario_id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->prioridad = $prioridad;
        $this->fechaLimite = $fechaLimite;
        $this->usuario_id = $usuario_id;  
    }
    
    //Getters
    public function getId() { 
        return $this->id; 
    }

    public function getNombre() { 
        return $this->nombre; 
    }
    public function getDescripcion() { 
        return $this->descripcion; 
    }

    public function getPrioridad() { 
        return $this->prioridad; 
    }

    public function getFechaLimite() { 
        return $this->fechaLimite; 
    }

    public function getUsuarioId() { 
        return $this->usuario_id; 
    }
    
    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) { 
        $this->nombre = $nombre; 
    }
    
    public function setDescripcion($descripcion) { 
        $this->descripcion = $descripcion; 
    }
    
    public function setPrioridad($prioridad) { 
        $this->prioridad = $prioridad; 
    }
    
    public function setFechaLimite($fechaLimite) { 
        $this->fechaLimite = $fechaLimite; 
    }

    public function setUsuarioId($usuario_id) { 
        $this->usuario_id = $usuario_id; 
    }
}