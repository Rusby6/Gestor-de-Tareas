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
        h1 {
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
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
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
        .nombreError {
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
    <h1>Agregar Tareas</h1>

     <?php if (isset($errores['nombre'])): ?>
    <div class="nombreError">
        <p>Introduce un nombre para la tarea</p>
    </div>
    <?php endif; ?>
        
    <?php if (isset($errores['fecha'])): ?>
        <div class="fechaError">
            <p>Selecciona una fecha</p>
        </div>
    <?php endif; ?>

    <form name="formulario" method="POST" action="index.php?accion=agregarTarea">
        <label>Nombre de la tarea:</label>
        <input type="text" name="nombre">
        <br>
        <br>
        <label>Descripción (opcional):</label>
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