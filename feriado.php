<!doctype html>  
<html lang="es">  
<head>  
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Feriados</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  <link rel="stylesheet" href="src/css/styles.css">  
</head>  
<body>  
  
  <main class="container mt-4">  
    <h1 class="bg-info p-3 text-white text-center rounded">📅 LISTADO DE FERIADOS</h1>  
  
    <div class="text-end mb-3">  
      <a href="Formularios/AgregarFeriado.php" class="btn btn-success">  
        <i class="bi bi-plus-circle"></i> Agregar Feriado  
      </a>  
    </div>  
  
    <div class="table-container">  
      <table class="table table-hover">  
        <thead>  
          <tr>  
            <th>Fecha</th>  
            <th>Descripción</th>  
            <th>Acciones</th>  
          </tr>  
        </thead>  
        <tbody>  
          <?php  
            require("Config/Conexion.php");  
            $sql = $conexion->query("SELECT * FROM feriados ORDER BY fecha ASC");  
            while ($resultado = $sql->fetch_assoc()) {  
          ?>  
          <tr>  
            <td><?php echo date('d/m/Y', strtotime($resultado['fecha'])); ?></td>  
            <td><?php echo $resultado['descripcion']; ?></td>  
            <td class="acciones">  
              <a href="Formularios/EditarFeriado.php?Id=<?php echo $resultado['id']; ?>" class="btn btn-warning btn-sm">  
                <i class="bi bi-pencil"></i> Editar  
              </a>  
              <a href="CRUD/eliminarFeriado.php?Id=<?php echo $resultado['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este feriado?')">  
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