<?php  
include("../Config/Conexion.php");  
  
// Recibir el ID de la vacacion a eliminar  
$id = $_GET['Id'];  
  
// Eliminar vacacion de la base de datos  
$sql = "DELETE FROM vacaciones WHERE id=$id";  
  
if (mysqli_query($conexion, $sql)) {  
    header("location:../vacacion.php");  
} else {  
    echo "Vacacion no eliminado: " . mysqli_error($conexion);  
}  