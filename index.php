<?php
require_once 'session.php';
require_once 'controller/LoginController.php';
require_once 'controller/TareaController.php';

// Qué acción ejecutar
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'mostrarLogin';
}

// Crear controladores
$loginController = new LoginController();
$tareaController = new TareaController();

/* // Verificar si necesita login (excepto para login/logout)
$necesitaLogin = !in_array($action, ['mostrarLogin', 'procesarLogin', 'logout']);

if ($necesitaLogin && !$loginController->isLoggedIn()) {
    header('Location: index.php?action=mostrarLogin');
    exit();
} */

// Ejecutar la acción correspondiente
switch ($action) {
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