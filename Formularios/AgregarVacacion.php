<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Agregar Vacación</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body>  
    <h1 class="bg-black p-2 text-white text-center">Agregar Vacación</h1>  
    <div class="container">  
        <form action="../CRUD/insertarVacacion.php" method="post">  
            <!-- Seleccionar empleado -->  
            <label for="">Empleado</label>  
            <select class="form-select mb-3" name="EmpleadoId" required>  
                <option selected disabled>--Seleccionar empleado--</option>  
                <?php  
                include ("../Config/Conexion.php");  
                $sql = $conexion->query("SELECT usuarios.id, usuarios.nombre, usuarios.apellido, roles.nombre as rol_nombre   
                                         FROM usuarios   
                                         INNER JOIN roles ON usuarios.rol_id = roles.id   
                                         WHERE usuarios.activo = 1   
                                         ORDER BY usuarios.nombre ASC");  
                while ($resultado = $sql->fetch_assoc()) {  
                    echo "<option value='".$resultado['id']."'>".$resultado['nombre']." ".$resultado['apellido']." - ".$resultado['rol_nombre']."</option>";  
                }  
                ?>  
            </select>  
  
            <!-- Fecha de inicio -->  
            <div class="mb-3">  
                <label class="form-label">Fecha de Inicio</label>  
                <input type="date" class="form-control" name="FechaInicio" required>  
            </div>  
  
            <!-- Fecha de fin -->  
            <div class="mb-3">  
                <label class="form-label">Fecha de Fin</label>  
                <input type="date" class="form-control" name="FechaFin" required>  
            </div>  
  
            <!-- Descripción -->  
            <div class="mb-3">  
                <label class="form-label">Descripción (opcional)</label>  
                <textarea class="form-control" name="Descripcion" rows="3" placeholder="Ej: Vacaciones anuales, Vacaciones de verano"></textarea>  
            </div>  
  
            <div class="text-center">  
                <button type="submit" class="btn btn-danger">Registrar</button>  
                <a href="../vacacion.php" class="btn btn-dark">Cancelar</a>  
            </div>  
        </form>  
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>