<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Cerrar Sesión</title>
    <meta name="description" content="Cerrar Sesión">
    <meta name="author" content="RUSLAN">
</head>
<body>
    <?php
    require_once 'session.php';
    $sesion = new Session();
    
    $sesion->destroySession();
    
    echo "<h1>Has Cerrado Sesión correctamente</h1>";
    echo "<p><a href='Login.php'>Ir al Login</a></p>";
    ?>
</body>
</html>