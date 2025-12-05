<?php
class GestorTareas {
    private $session;
    
    public function __construct() {
        $this->session = new Session();
        
        if (!$this->session->get('tareas')) {  
            $this->session->set('tareas', []);  // Array asociativo de session
        }

        if (!$this->session->get('ultimo_id')) {
            $this->session->set('ultimo_id', 0);  // Contador de ultimos IDs
        }
    }
    
    private function generarId() {
        $ultimoId = $this->session->get('ultimo_id');
        $nuevoId = $ultimoId + 1;
        $this->session->set('ultimo_id', $nuevoId);
        return $nuevoId;
    }

    public function agregarTarea($tarea) {
        // Generar un nuevo ID
        $nuevoId = $this->generarId();
        $tarea->setId($nuevoId);

        // Obtener el array actual de tareas
        $tareas = $this->session->get('tareas');
        
        // Agregar la nueva tarea
        $tareas[$nuevoId] = $tarea;
        
        // Guardar el array actualizado en la sesión
        $this->session->set('tareas', $tareas);
    }
    
    public function obtenerTareas() {
        return $this->session->get('tareas');
    }
    
    public function eliminarTarea($id) {
        $tareas = $this->session->get('tareas');
        unset($tareas[$id]);
        $this->session->set('tareas', $tareas);
    }
    
    public function actualizarTarea($id, $nuevosDatos) {
        // Obtener el array de tareas
        $tareas = $this->session->get('tareas');
        
        // Verificar si existe
        if (!isset($tareas[$id])) {
            return false;
        }
        
        // Recuperar la tarea actual
        $tarea = $tareas[$id];

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

        // Guardar la tarea actualizada
        $tareas[$id] = $tarea;
        $this->session->set('tareas', $tareas);

        return true;
    }
}