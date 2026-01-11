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

            $errores = [];

            if (empty($nombre)) {
                $errores['nombre'] = true;
            }

            if (empty($fecha_limite)) {
                $errores['fecha'] = true;
            }
        
            if (!empty($errores)) {
                include 'views/tarea_form.php';
                return;
            }
            
            $tarea = new Tarea($nombre, $descripcion, $prioridad, $fecha_limite);

            $this->gestor->agregarTarea($tarea);

            header('Location: index.php?accion=listarTareas');
            exit();            
        }
    }

    public function listarTareas() {
        $tareas = $this->gestor->obtenerTareas();
        include 'views/tarea_lista.php';
    }

    public function eliminarTarea() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->gestor->eliminarTarea($id);
            
            header('Location: index.php?accion=listarTareas');
            exit();
        }
    }

    public function mostrarEditar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $tarea = $this->gestor->obtenerTareaPorId($id);
            
            if ($tarea) {
                include 'views/tarea_editar.php';
            } else {
                // Si la tarea no existe o no pertenece al usuario
                header('Location: index.php?accion=listarTareas');
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
            
            $errores = [];

            if (empty($nombre)) {
                $errores['nombre'] = true;
            }

            if (empty($fecha_limite)) {
                $errores['fecha'] = true;
            }
        
            if (!empty($errores)) {
                $tarea = $this->gestor->obtenerTareaPorId($id);
                if ($tarea) {
                    include 'views/tarea_editar.php';
                } else {
                    header('Location: index.php?accion=listarTareas');
                    exit();
                }
                return;
            }

            $nuevosDatos = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'prioridad' => $prioridad,
                'fechaLimite' => $fecha_limite
            ];
            
            $this->gestor->actualizarTarea($id, $nuevosDatos);
            
            header('Location: index.php?accion=listarTareas');
            exit();
        } 
    }
}