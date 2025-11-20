<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agregar Tareas</h1>
    <br>
    <form name="formulario" method="POST" action="index.php?action=agregarTarea">
    <label>Nombre de la tarea:</label>
    <input type="text" name="nombre" required>

    <br>
    <br>

    <label>Descripción:</label>
    <br>
    <textarea name="descripcion"></textarea>

    <br>
    <br>

    <label>Prioridad:</label>
    <select name="prioridad">
        <option value="baja">Baja</option>
        <option value="media">Media</option>
        <option value="alta">Alta</option>
    </select>

    <br>
    <br>

    <label>Fecha límite:</label>
    <input type="date" name="fecha_limite">

    <br>
    <br>
    <br>
    
    <button type="submit">Agregar Tarea</button>
</form>
</body>
</html>