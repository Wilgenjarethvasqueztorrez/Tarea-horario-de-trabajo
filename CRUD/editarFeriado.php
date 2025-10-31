<?php  
include("../Config/Conexion.php");  
  
$id = intval($_POST['Id']);  
$fecha = $_POST['Fecha'];  
$descripcion = $_POST['Descripcion'];  
  
// Usar prepared statement  
$stmt = $conexion->prepare("UPDATE feriados SET fecha=?, descripcion=? WHERE id=?");  
$stmt->bind_param("ssi", $fecha, $descripcion, $id);  
  
if ($stmt->execute()) {  
    header("location:../feriado.php");  
} else {  
    if ($stmt->errno == 1062) { // Duplicate entry error  
        echo "Error: Ya existe un feriado registrado para esta fecha.";  
    } else {  
        echo "Feriado no actualizado: " . $stmt->error;  
    }  
}  
  
$stmt->close();  
