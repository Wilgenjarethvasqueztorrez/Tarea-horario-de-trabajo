<!doctype html>  
<html lang="es">  
<head>  
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Ver Asistencias</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  <link rel="stylesheet" href="../src/css/styles.css">  
</head>  
<body>  
  
  <main class="container mt-4">  
    <?php  
      require("../Config/Conexion.php");  
        
      // Obtener ID del empleado  
      $empleado_id = $_GET['Id'];  
        
      // Obtener información del empleado  
      $sqlEmpleado = $conexion->query("SELECT usuarios.*, roles.nombre as rol_nombre   
                                       FROM usuarios   
                                       INNER JOIN roles ON usuarios.rol_id = roles.id   
                                       WHERE usuarios.id = $empleado_id");  
      $empleado = $sqlEmpleado->fetch_assoc();  
    ?>  
  
    <h1 class="bg-info p-3 text-white text-center rounded">  
      📋 ASISTENCIAS DE <?php echo strtoupper($empleado['nombre']." ".$empleado['apellido']); ?>  
    </h1>  
  
    <div class="alert alert-info">  
      <strong>Rol:</strong> <?php echo $empleado['rol_nombre']; ?><br>  
      <strong>Estado:</strong> <?php echo $empleado['activo'] ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Inactivo</span>'; ?>  
    </div>  
  
    <div class="text-end mb-3">  
      <a href="RegistrarAsistencia.php" class="btn btn-success">  
        <i class="bi bi-plus-circle"></i> Registrar Nueva Asistencia  
      </a>  
    </div>  
  
    <div class="table-container">  
      <table class="table table-hover">  
        <thead>  
          <tr>  
            <th>Fecha</th>  
            <th>Hora Entrada</th>  
            <th>Hora Salida</th>  
            <th>Total Horas</th>  
            <th>Acciones</th>  
          </tr>  
        </thead>  
        <tbody>  
          <?php  
            $sql = $conexion->query("SELECT * FROM asistencias   
                                     WHERE empleado_id = $empleado_id   
                                     ORDER BY fecha DESC, hora_entrada DESC");  
              
            $total_horas_acumuladas = 0;  
            while ($resultado = $sql->fetch_assoc()) {  
              $total_horas_acumuladas += $resultado['total_horas'];  
          ?>  
          <tr>  
            <td><?php echo date('d/m/Y', strtotime($resultado['fecha'])); ?></td>  
            <td><?php echo $resultado['hora_entrada']; ?></td>  
            <td>  
              <?php   
              if ($resultado['hora_salida']) {  
                echo $resultado['hora_salida'];  
              } else {  
                echo "<span class='badge bg-warning'>Sin registrar</span>";  
              }  
              ?>  
            </td>  
            <td>  
              <?php   
              if ($resultado['total_horas'] > 0) {  
                echo number_format($resultado['total_horas'], 2) . " hrs";  
              } else {  
                echo "<span class='text-muted'>-</span>";  
              }  
              ?>  
            </td>  
            <td class="acciones">  
              <a href="EditarAsistencia.php?Id=<?php echo $resultado['id']; ?>" class="btn btn-warning btn-sm">  
                <i class="bi bi-pencil"></i> Editar  
              </a>  
              <a href="../CRUD/eliminarAsistencia.php?Id=<?php echo $resultado['id']; ?>&EmpleadoId=<?php echo $empleado_id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro?')">  
                <i class="bi bi-trash3"></i> Eliminar  
              </a>  
            </td>  
          </tr>  
          <?php } ?>  
        </tbody>  
        <tfoot>  
          <tr class="table-info">  
            <td colspan="3"><strong>Total Horas Registradas:</strong></td>  
            <td colspan="2"><strong><?php echo number_format($total_horas_acumuladas, 2); ?> hrs</strong></td>  
          </tr>  
        </tfoot>  
      </table>  
    </div>  
  
    <div class="text-center mt-4">  
      <a href="../index.php" class="btn btn-primary">  
        <i class="bi bi-arrow-left"></i> Volver a Usuarios  
      </a>  
    </div>  
  </main>  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>
