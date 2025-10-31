<?php  
include("../Config/Conexion.php");  
  
// Recibir datos del formulario  
$fecha = $_POST['Fecha'];  
$descripcion = $_POST['Descripcion'];  
  
// Insertar en la base de datos  
$sql = "INSERT INTO feriados (fecha, descripcion)   
        VALUES ('$fecha', '$descripcion')";  
  
if (mysqli_query($conexion, $sql)) {  
    header("location:../feriado.php");  
} else {  
    echo "Feriado no insertado: " . mysqli_error($conexion);  
}  
