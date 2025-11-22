<?php
require_once 'session.php';
require_once 'controller/LoginController.php';
require_once 'controller/TareaController.php';

// Qué acción ejecutar
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'mostrarLogin';
}

// Crear controladores
$loginController = new LoginController();
$tareaController = new TareaController();


// Ejecutar la acción correspondiente
switch ($accion) {
    case 'mostrarLogin':
        $loginController->mostrarLogin();
        break;
    case 'procesarLogin':
        $loginController->procesarLogin();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'mostrarFormulario':
        $tareaController->mostrarFormulario();
        break;
    case 'agregarTarea':
        $tareaController->agregarTarea();
        break;
    case 'listarTareas':
        $tareaController->listarTareas();
        break;
    case 'mostrarEditar':
        $tareaController->mostrarEditar();
        break;
    case 'editarTarea':
        $tareaController->editarTarea();
        break;
    case 'eliminarTarea':
        $tareaController->eliminarTarea();
        break;
    default:
        echo "Página no encontrada";
        break;
}