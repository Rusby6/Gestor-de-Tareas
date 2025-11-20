<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Lista de Tareas</h2>
    
       <?php if (empty($tareas)): ?>
        <p>No hay tareas registradas.</p>
    <?php else: ?>
        <table border="1" style="width: 100%;">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Prioridad</th>
                <th>Fecha Límite</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php foreach ($tareas as $id => $tarea): ?>
            <tr>
                <td><?php echo $tarea->getNombre(); ?></td>
                <td><?php echo $tarea->getDescripcion(); ?></td>
                <td><?php echo $tarea->getPrioridad(); ?></td>
                <td><?php echo $tarea->getFechaLimite(); ?></td>
                <td>
                    <!-- Botón Editar -->
                    <form method="POST" action="index.php?action=mostrarEditar&id=<?php echo $id; ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
                <td>
                    <!-- Botón Eliminar -->
                    <form method="POST" action="index.php?action=eliminarTarea&id=<?php echo $id; ?>">
                        <button type="submit" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br><br>

    <form method="POST" action="index.php?action=mostrarFormulario">
        <button type="submit">Añadir nueva tarea</button>
    </form>
    <br>
    <form method="POST" action="index.php?action=logout">
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>
</html>