<?php
$direccion_basedatos = "192.168.0.14";
$usuario = "juan";
$contra = "123";
$basedatos = "cafeteria";
$conn = new mysqli($direccion_basedatos, $usuario, $contra, $basedatos);

if ($conn->connect_error) {
  die("Ocurrió un error al conectarsé a la base de datos");
}
?>
