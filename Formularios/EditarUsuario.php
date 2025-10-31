<!doctype html>  
<html lang="es">  
  <head>  
   <meta charset="UTF-8">  
   <meta name="viewport" content="width=device-width, initial-scale=1">  
   <title>Editar usuario</title>  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
  </head>  
<body>  
 <h1 class="bg-black p-2 text-white text-center">EDITAR USUARIO</h1>  
 <br>  
 <form class="container" action="../CRUD/editarUsuario.php" method="post">  
  <?php  
   include ('../Config/Conexion.php');  
   $sql = "SELECT * FROM usuarios WHERE id = " . $_GET['Id'];  
   $resultado = $conexion->query($sql);  
   $row = $resultado->fetch_assoc();  
  ?>  
  <input type="hidden" class="form-control" name="Id" value="<?php echo $row['id']; ?>">  
  
  <!-- Nombre -->  
  <div class="mb-3">  
    <label class="form-label">Nombre</label>  
    <input type="text" class="form-control" name="NombreUsuario" value="<?php echo $row['nombre']; ?>" required>  
  </div>  
  
  <!-- Apellido -->  
  <div class="mb-3">  
    <label class="form-label">Apellido</label>  
    <input type="text" class="form-control" name="ApellidoUsuario" value="<?php echo $row['apellido']; ?>" required>  
  </div>  
  
  <!-- Rol (ahora desde tabla roles) -->  
  <label for="">Rol</label>  
  <select class="form-select mb-3" name="RolUsuario" required>  
    <option disabled>--Seleccionar rol--</option>  
    <?php  
      $sqlRol = $conexion->query("SELECT id, nombre, descripcion FROM roles ORDER BY nombre");  
      while ($rol = $sqlRol->fetch_assoc()) {  
        $selected = ($row['rol_id'] == $rol['id']) ? "selected" : "";  
        $descripcion = $rol['descripcion'] ? " - " . $rol['descripcion'] : "";  
        echo "<option value='".$rol['id']."' $selected>".$rol['nombre'].$descripcion."</option>";  
      }  
    ?>  
  </select>  
  
  <!-- Estado (nuevo campo) -->  
  <div class="mb-3">  
    <label class="form-label">Estado</label>  
    <select class="form-select" name="Activo" required>  
      <option value="1" <?php echo ($row['activo'] == 1) ? 'selected' : ''; ?>>Activo</option>  
      <option value="0" <?php echo ($row['activo'] == 0) ? 'selected' : ''; ?>>Inactivo</option>  
    </select>  
  </div>  
  
  <div class="text-center">  
    <button type="submit" class="btn btn-danger">Actualizar</button>  
    <a href="../index.php" class="btn btn-dark">Cancelar</a>  
  </div>  
 </form>  
</body>  
</html>