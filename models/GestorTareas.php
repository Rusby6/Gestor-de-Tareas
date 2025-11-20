<?php
class GestorTareas {
    public function __construct() {
        if (!isset($_SESSION['tareas'])) {  
            $_SESSION['tareas'] = array();  // Array asociativo
        }

        if (!isset($_SESSION['ultimo_id'])) {
            $_SESSION['ultimo_id'] = 0;  // Contador de ultimos IDs
        }
    }
    
    private function generarId() {
        $_SESSION['ultimo_id']++;
        return $_SESSION['ultimo_id'];
    }

    public function agregarTarea($tarea) {
        // Generar un nuevo ID
        $nuevoId = $this->generarId();
        
        $tarea->setId($nuevoId);

        // Guardar la tarea en el array de sesión
        $_SESSION['tareas'][$nuevoId] = $tarea;
    }
    
    public function obtenerTareas() {
        return $_SESSION['tareas'];
    }
    
    public function eliminarTarea($id) {
        unset($_SESSION['tareas'][$id]);
    }
    
    public function actualizarTarea($id, $nuevosDatos) {
    //Verificar que la tarea existe
    if (!isset($_SESSION['tareas'][$id])) {
    return false;
    }
    //Recuperar la tarea actual
    $tarea = $_SESSION['tareas'][$id];

    // Actualizar propiedades
    if (isset($nuevosDatos['nombre'])) {
        $tarea->setNombre($nuevosDatos['nombre']);
    }
        
    if (isset($nuevosDatos['descripcion'])) {
        $tarea->setDescripcion($nuevosDatos['descripcion']);
    }
        
    if (isset($nuevosDatos['prioridad'])) {
        $tarea->setPrioridad($nuevosDatos['prioridad']);
    }
        
    if (isset($nuevosDatos['fechaLimite'])) {
        $tarea->setFechaLimite($nuevosDatos['fechaLimite']);
    }

    return true;

    }
}   

