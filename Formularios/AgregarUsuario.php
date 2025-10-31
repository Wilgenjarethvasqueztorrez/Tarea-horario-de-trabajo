<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Agregar Usuario</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body>  
    <h1 class="bg-black p-2 text-white text-center">Agregar Usuario</h1>  
    <div class="container">  
        <form action="../CRUD/insertarUsuario.php" method="post">  
            <!-- Nombre -->  
            <div class="mb-3">  
                <label class="form-label">Nombre</label>  
                <input type="text" class="form-control" name="NombreUsuario" required>  
            </div>  
  
            <!-- Apellido -->  
            <div class="mb-3">  
                <label class="form-label">Apellido</label>  
                <input type="text" class="form-control" name="ApellidoUsuario" required>  
            </div>  
  
            <!-- Rol (ahora desde tabla roles) -->  
            <label for="">Rol</label>  
            <select class="form-select mb-3" name="RolUsuario" required>  
                <option selected disabled>--Seleccionar rol--</option>  
                <?php  
                include ("../Config/Conexion.php");  
                $sql = $conexion->query("SELECT id, nombre, descripcion FROM roles ORDER BY nombre");  
                while ($resultado = $sql->fetch_assoc()) {  
                    $descripcion = $resultado['descripcion'] ? " - " . $resultado['descripcion'] : "";  
                    echo "<option value='".$resultado['id']."'>".$resultado['nombre'].$descripcion."</option>";  
                }  
                ?>  
            </select>  
  
            <!-- Estado (nuevo campo) -->  
            <div class="mb-3">  
                <label class="form-label">Estado</label>  
                <select class="form-select" name="Activo" required>  
                    <option value="1" selected>Activo</option>  
                    <option value="0">Inactivo</option>  
                </select>  
            </div>  
  
            <!-- Botones -->  
            <div class="text-center">  
                <button type="submit" class="btn btn-danger">Registrar</button>  
                <a href="../index.php" class="btn btn-dark">Cancelar</a>  
            </div>  
        </form>  
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>