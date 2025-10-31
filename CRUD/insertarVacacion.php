<?php  
include("../Config/Conexion.php");  
  
// Recibir datos del formulario  
$empleado_id = $_POST['EmpleadoId'];  
$fecha_inicio = $_POST['FechaInicio'];  
$fecha_fin = $_POST['FechaFin'];  
$descripcion = isset($_POST['Descripcion']) && $_POST['Descripcion'] != '' ? $_POST['Descripcion'] : NULL;  
  
// Insertar en la base de datos  
if ($descripcion === NULL) {  
    $sql = "INSERT INTO vacaciones (empleado_id, fecha_inicio, fecha_fin, descripcion)   
            VALUES ($empleado_id, '$fecha_inicio', '$fecha_fin', NULL)";  
} else {  
    $sql = "INSERT INTO vacaciones (empleado_id, fecha_inicio, fecha_fin, descripcion)   
            VALUES ($empleado_id, '$fecha_inicio', '$fecha_fin', '$descripcion')";  
}  
  
if (mysqli_query($conexion, $sql)) {  
    header("location:../vacacion.php");  
} else {  
    echo "Vacación no insertada: " . mysqli_error($conexion);  
}  
