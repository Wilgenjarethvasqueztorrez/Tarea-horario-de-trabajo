<?php  
include("../Config/Conexion.php");  
  
// Recibir datos del formulario  
$id = $_POST['Id'];  
$nombre = $_POST['NombreUsuario'];  
$apellido = $_POST['ApellidoUsuario'];  
$rol_id = $_POST['RolUsuario'];  
$activo = $_POST['Activo'];  
  
// Actualizar en la base de datos  
$sql = "UPDATE usuarios   
        SET nombre='$nombre', apellido='$apellido', rol_id=$rol_id, activo=$activo   
        WHERE id=$id";  
  
if (mysqli_query($conexion, $sql)) {  
    header("location:../index.php");  
} else {  
    echo "Usuario no actualizado: " . mysqli_error($conexion);  
}  
