<?php
require_once 'models/GestorTareas.php';
require_once 'models/Tarea.php';

class TareaController {
    private $gestor;

    public function __construct() {
        $this->gestor = new GestorTareas();
    }

    public function mostrarFormulario(){
        include 'views/tarea_form.php';
    }

    public function agregarTarea(){
        if($_POST){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $prioridad = $_POST['prioridad'];
            $fecha_limite = $_POST['fecha_limite']; 
            
            $tarea = new Tarea($nombre, $descripcion, $prioridad, $fecha_limite);

            //Guardar la tarea
            $this->gestor->agregarTarea($tarea);

            header('Location: index.php?action=listarTareas');
            exit();            
        }
    }

    public function listarTareas() {
        // Obtener tareas usando el gestor
        $tareas = $this->gestor->obtenerTareas();
        include 'views/tarea_lista.php';
    }

    public function eliminarTarea() {
        // Obtener el ID de la tarea 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->gestor->eliminarTarea($id);
            
            header('Location: index.php?action=listarTareas');
            exit();
        }
    }


    public function mostrarEditar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Obtener la tarea del gestor
            $tareas = $this->gestor->obtenerTareas();
            
            if (isset($tareas[$id])) {
                $tarea = $tareas[$id];
                include 'views/tarea_editar.php';
            } else {
                header('Location: index.php?action=listarTareas');
                exit();
            }
        }

    }

    public function editarTarea() {
        if ($_POST) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $prioridad = $_POST['prioridad'];
            $fecha_limite = $_POST['fecha_limite'];
            
            // Crear array con nuevos datos
            $nuevosDatos = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'prioridad' => $prioridad,
                'fechaLimite' => $fecha_limite
            ];
            
            $this->gestor->actualizarTarea($id, $nuevosDatos);
            
            header('Location: index.php?action=listarTareas');
            exit();
        } 
    }
}
