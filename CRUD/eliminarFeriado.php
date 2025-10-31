<?php  
include("../Config/Conexion.php");  
  
// Recibir el ID del dia feriado a eliminar  
$id = $_GET['Id'];  
  
// Eliminar el dia feriado de la base de datos  
$sql = "DELETE FROM feriados WHERE id=$id";  
  
if (mysqli_query($conexion, $sql)) {  
    header("location:../feriado.php");  
} else {  
    echo "Feriado no eliminado: " . mysqli_error($conexion);  
}  