<?php

  $host = "localhost";
  $user = "root";
  $pass = "wilgen12345";
  $db = "control_asistencia_completa";

  $conexion =new mysqli($host,$user,$pass,$db);

  if (!$conexion) {
    echo 'Conexion fallida';
  }