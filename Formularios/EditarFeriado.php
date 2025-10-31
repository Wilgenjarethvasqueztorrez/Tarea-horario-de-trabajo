<!doctype html>  
<html lang="es">  
  <head>  
   <meta charset="UTF-8">  
   <meta name="viewport" content="width=device-width, initial-scale=1">  
   <title>Editar Feriado</title>  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
  </head>  
<body>  
 <h1 class="bg-black p-2 text-white text-center">Editar Feriado</h1>  
 <br>  
 <form class="container" action="../CRUD/editarFeriado.php" method="post">  
  <?php  
   include ('../Config/Conexion.php');  
   $sql = "SELECT * FROM feriados WHERE id = " . $_GET['Id'];  
   $resultado = $conexion->query($sql);  
   $row = $resultado->fetch_assoc();  
  ?>  
  <input type="hidden" class="form-control" name="Id" value="<?php echo $row['id']; ?>">  
  
  <!-- Fecha -->  
  <div class="mb-3">  
    <label class="form-label">Fecha del Feriado</label>  
    <input type="date" class="form-control" name="Fecha" value="<?php echo $row['fecha']; ?>" required>  
  </div>  
  
  <!-- Descripción -->  
  <div class="mb-3">  
    <label class="form-label">Descripción</label>  
    <input type="text" class="form-control" name="Descripcion" value="<?php echo $row['descripcion']; ?>" placeholder="Ej: Día del Trabajador" required>  
  </div>  
  
  <div class="text-center">  
    <button type="submit" class="btn btn-danger">Actualizar</button>  
    <a href="../feriado.php" class="btn btn-dark">Cancelar</a>  
  </div>  
 </form>  
</body>  
</html>