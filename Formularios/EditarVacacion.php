<!doctype html>  
<html lang="es">  
  <head>  
   <meta charset="UTF-8">  
   <meta name="viewport" content="width=device-width, initial-scale=1">  
   <title>Editar Vacación</title>  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
  </head>  
<body>  
 <h1 class="bg-black p-2 text-white text-center">Editar Vacación</h1>  
 <br>  
 <form class="container" action="../CRUD/editarVacacion.php" method="post">  
  <?php  
   include ('../Config/Conexion.php');  
   $sql = "SELECT vacaciones.*, usuarios.nombre, usuarios.apellido   
           FROM vacaciones   
           INNER JOIN usuarios ON vacaciones.empleado_id = usuarios.id   
           WHERE vacaciones.id = " . $_GET['Id'];  
   $resultado = $conexion->query($sql);  
   $row = $resultado->fetch_assoc();  
  ?>  
  <input type="hidden" class="form-control" name="Id" value="<?php echo $row['id']; ?>">  
  <input type="hidden" class="form-control" name="EmpleadoId" value="<?php echo $row['empleado_id']; ?>">  
  
  <!-- Información del empleado (solo lectura) -->  
  <div class="mb-3">  
    <label class="form-label">Empleado</label>  
    <input type="text" class="form-control" value="<?php echo $row['nombre'] . ' ' . $row['apellido']; ?>" readonly>  
  </div>  
  
  <!-- Fecha de inicio -->  
  <div class="mb-3">  
    <label class="form-label">Fecha de Inicio</label>  
    <input type="date" class="form-control" name="FechaInicio" value="<?php echo $row['fecha_inicio']; ?>" required>  
  </div>  
  
  <!-- Fecha de fin -->  
  <div class="mb-3">  
    <label class="form-label">Fecha de Fin</label>  
    <input type="date" class="form-control" name="FechaFin" value="<?php echo $row['fecha_fin']; ?>" required>  
  </div>  
  
  <!-- Descripción -->  
  <div class="mb-3">  
    <label class="form-label">Descripción (opcional)</label>  
    <textarea class="form-control" name="Descripcion" rows="3"><?php echo $row['descripcion']; ?></textarea>  
  </div>  
  
  <div class="text-center">  
    <button type="submit" class="btn btn-danger">Actualizar</button>  
    <a href="../vacacion.php" class="btn btn-dark">Cancelar</a>  
  </div>  
 </form>  
</body>  
</html>