<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        h2 {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        th {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #e1e5ee;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        tr:last-child td {
            border-bottom: none;
        }
        button {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        button:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        button[onclick] {
            background: linear-gradient(135deg, #f72585, #b5179e);
        }
        form {
            display: inline;
        }
        p {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 15px;
            color: #666;
            font-size: 18px;
        }
        .actions {
            text-align: center;
        }
        .actions form {
            display: inline-block;
            margin: 5px;
        }
    </style>
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
                <th>Fecha</th>
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
                    <form method="POST" action="index.php?accion=mostrarEditar&id=<?php echo $id; ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
                <td>
                    <!-- Botón Eliminar -->
                    <form method="POST" action="index.php?accion=eliminarTarea&id=<?php echo $id; ?>">
                        <button type="submit" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br><br>

    <form method="POST" action="index.php?accion=mostrarFormulario">
        <button type="submit">Añadir nueva tarea</button>
    </form>
    <br>
    <br>
    <form method="POST" action="index.php?accion=logout">
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>
</html>