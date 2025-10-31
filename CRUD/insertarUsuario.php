<?php  
include("../Config/Conexion.php");  
  
// Recibir datos del formulario  
$nombre = $_POST['NombreUsuario'];  
$apellido = $_POST['ApellidoUsuario'];  
$rol_id = $_POST['RolUsuario'];  
$activo = $_POST['Activo'];  
  
// Insertar en la base de datos  
$sql = "INSERT INTO usuarios (nombre, apellido, rol_id, activo)   
        VALUES ('$nombre', '$apellido', $rol_id, $activo)";  
  
if (mysqli_query($conexion, $sql)) {  
    header("location:../index.php");  
} else {  
    echo "Usuario no insertado: " . mysqli_error($conexion);  
}  
