<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarea</title>
</head>
<body>
    <h2>Editar Tarea</h2>
    
    <form method="POST" action="index.php?accion=editarTarea">
        <!-- Campo hidden para el ID -->
        <input type="hidden" name="id" value="<?= $tarea->getId() ?>">
        
        <label>Nombre de la tarea:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($tarea->getNombre()) ?>" required>
        
        <br><br>
        
        <label>Descripción:</label>
        <br>
        <textarea name="descripcion"><?= htmlspecialchars($tarea->getDescripcion()) ?></textarea>
        
        <br><br>
        
        <label>Prioridad:</label>
        <select name="prioridad">
            <option value="baja" <?= $tarea->getPrioridad() == 'baja' ? 'selected' : '' ?>>Baja</option>
            <option value="media" <?= $tarea->getPrioridad() == 'media' ? 'selected' : '' ?>>Media</option>
            <option value="alta" <?= $tarea->getPrioridad() == 'alta' ? 'selected' : '' ?>>Alta</option>
        </select>
        
        <br><br>
        
        <label>Fecha límite:</label>
        <input type="date" name="fecha_limite" value="<?= $tarea->getFechaLimite() ?>">
        
        <br><br>
        
        <button type="submit">Guardar Cambios</button>
    </form>
    
    <br>
    <a href="index.php?accion=listarTareas">Volver a la lista</a>
</body>
</html>