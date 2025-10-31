<?php  
include("../Config/Conexion.php");  
  
// Recibir datos del formulario  
$id = $_POST['Id'];  
$empleado_id = $_POST['EmpleadoId'];  
$fecha_inicio = $_POST['FechaInicio'];  
$fecha_fin = $_POST['FechaFin'];  
$descripcion = isset($_POST['Descripcion']) && $_POST['Descripcion'] != '' ? $_POST['Descripcion'] : NULL;  
  
// Actualizar en la base de datos  
if ($descripcion === NULL) {  
    $sql = "UPDATE vacaciones   
            SET empleado_id=$empleado_id, fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', descripcion=NULL   
            WHERE id=$id";  
} else {  
    $sql = "UPDATE vacaciones   
            SET empleado_id=$empleado_id, fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', descripcion='$descripcion'   
            WHERE id=$id";  
}  
  
if (mysqli_query($conexion, $sql)) {  
    header("location:../vacacion.php");  
} else {  
    echo "Vacación no actualizada: " . mysqli_error($conexion);  
}  
