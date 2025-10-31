<!doctype html>  
<html lang="es">  
<head>  
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Vacaciones</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  <link rel="stylesheet" href="src/css/styles.css">  
</head>  
<body>  
  
  <main class="container mt-4">  
    <h1 class="bg-info p-3 text-white text-center rounded">🏖️ LISTADO DE VACACIONES</h1>  
  
    <div class="text-end mb-3">  
      <a href="Formularios/AgregarVacacion.php" class="btn btn-success">  
        <i class="bi bi-plus-circle"></i> Agregar Vacación  
      </a>  
    </div>  
  
    <div class="table-container">  
      <table class="table table-hover">  
        <thead>  
          <tr>  
            <th>Empleado</th>  
            <th>Rol</th>  
            <th>Fecha Inicio</th>  
            <th>Fecha Fin</th>  
            <th>Días</th>  
            <th>Descripción</th>  
            <th>Acciones</th>  
          </tr>  
        </thead>  
        <tbody>  
          <?php  
            require("Config/Conexion.php");  
            $sql = $conexion->query("SELECT vacaciones.*,   
                                            usuarios.nombre,   
                                            usuarios.apellido,  
                                            roles.nombre as rol_nombre,  
                                            DATEDIFF(vacaciones.fecha_fin, vacaciones.fecha_inicio) + 1 as dias_totales  
                                     FROM vacaciones   
                                     INNER JOIN usuarios ON vacaciones.empleado_id = usuarios.id  
                                     INNER JOIN roles ON usuarios.rol_id = roles.id  
                                     ORDER BY vacaciones.fecha_inicio DESC");  
            while ($resultado = $sql->fetch_assoc()) {  
          ?>  
          <tr>  
            <td>  
              <div class="nombre-apellido">  
                <span><strong><?php echo $resultado['nombre']; ?></strong></span>  
                <span><?php echo $resultado['apellido']; ?></span>  
              </div>  
            </td>  
            <td><?php echo $resultado['rol_nombre']; ?></td>  
            <td><?php echo date('d/m/Y', strtotime($resultado['fecha_inicio'])); ?></td>  
            <td><?php echo date('d/m/Y', strtotime($resultado['fecha_fin'])); ?></td>  
            <td><span class="badge bg-primary"><?php echo $resultado['dias_totales']; ?> días</span></td>  
            <td><?php echo $resultado['descripcion'] ? $resultado['descripcion'] : '<span class="text-muted">Sin descripción</span>'; ?></td>  
            <td class="acciones">  
              <a href="Formularios/EditarVacacion.php?Id=<?php echo $resultado['id']; ?>" class="btn btn-warning btn-sm">  
                <i class="bi bi-pencil"></i> Editar  
              </a>  
              <a href="CRUD/eliminarVacacion.php?Id=<?php echo $resultado['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta vacación?')">  
                <i class="bi bi-trash3"></i> Eliminar  
              </a>  
            </td>  
          </tr>  
          <?php } ?>  
        </tbody>  
      </table>  
    </div>  
  
    <div class="text-center mt-4">  
      <a href="index.php" class="btn btn-primary">  
        <i class="bi bi-arrow-left"></i> Volver a Usuarios  
      </a>  
    </div>  
  </main>  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>