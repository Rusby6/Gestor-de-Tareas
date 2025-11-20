<?php
class Tarea {
    private $id;
    private $nombre;
    private $descripcion;
    private $prioridad;
    private $fechaLimite;
    
    public function __construct($nombre, $descripcion, $prioridad, $fechaLimite, $id = null) {
    $this->id = $id;  // Puede ser null
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->prioridad = $prioridad;
    $this->fechaLimite = $fechaLimite;
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
}