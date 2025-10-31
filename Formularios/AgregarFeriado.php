<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Agregar Feriado</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body>  
    <h1 class="bg-black p-2 text-white text-center">Agregar Feriado</h1>  
    <div class="container">  
        <form action="../CRUD/insertarFeriado.php" method="post">  
            <!-- Fecha -->  
            <div class="mb-3">  
                <label class="form-label">Fecha del Feriado</label>  
                <input type="date" class="form-control" name="Fecha" required>  
            </div>  
  
            <!-- Descripción -->  
            <div class="mb-3">  
                <label class="form-label">Descripción</label>  
                <input type="text" class="form-control" name="Descripcion" placeholder="Ej: Día del Trabajador" required>  
            </div>  
  
            <!-- Botones -->  
            <div class="text-center">  
                <button type="submit" class="btn btn-danger">Registrar</button>  
                <a href="../feriado.php" class="btn btn-dark">Cancelar</a>  
            </div>  
        </form>  
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>