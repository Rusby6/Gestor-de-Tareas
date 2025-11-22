<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarea</title>
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
        form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e5ee;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #4361ee;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        button {
            background: linear-gradient(135deg, #4cc9f0, #4895ef);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .fechaError {
        color: #d32f2f;
        background-color: #ffebee;
        border: 1px solid #f44336;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: 600;
    }
    </style>
</head>
<body>
    <h2>Editar Tarea</h2>

    <?php if (isset($fechaError)): ?>
        <div class="fechaError">Error: Selecciona una fecha</div>
    <?php endif; ?>
    
    <form method="POST" action="index.php?accion=editarTarea">
        <!-- Campo hidden para el ID -->
        <input type="hidden" name="id" value="<?php echo $tarea->getId() ?>">
        
        <label>Nombre de la tarea:</label>
        <input type="text" name="nombre" value="<?php echo $tarea->getNombre() ?>" required>
        
        <br><br>
        
        <label>Descripción (opcional):</label>
        <br>
        <textarea name="descripcion"><?php echo $tarea->getDescripcion() ?></textarea>
        
        <br><br>
        
        <label>Prioridad:</label>
        <select name="prioridad">
            <option value="baja" <?php if ($tarea->getPrioridad() == 'baja') echo 'selected'; ?>>Baja</option>
            <option value="media" <?php if ($tarea->getPrioridad() == 'media') echo 'selected'; ?>>Media</option>
            <option value="alta" <?php if ($tarea->getPrioridad() == 'alta') echo 'selected'; ?>>Alta</option>
        </select>
        
        <br><br>
        
        <label>Fecha límite:</label>
        <input type="date" name="fecha_limite" value="<?php echo $tarea->getFechaLimite() ?>">
        
        <br><br>
        
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>