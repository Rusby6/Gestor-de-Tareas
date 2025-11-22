<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarea</title>
</head>
<body>
    <h2>Editar Tarea</h2>
    
    <form method="POST" action="index.php?accion=editarTarea">
        <!-- Campo hidden para el ID -->
        <input type="hidden" name="id" value="<?php echo $tarea->getId() ?>">
        
        <label>Nombre de la tarea:</label>
        <input type="text" name="nombre" value="<?php echo $tarea->getNombre() ?>" required>
        
        <br><br>
        
        <label>Descripción:</label>
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