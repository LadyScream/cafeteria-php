<?php
// Define variables con la IP, el usuario, contraseña y base de datos
$direccion_basedatos = "192.168.0.14";
$usuario = "juan";
$contra = "123";
$basedatos = "cafeteria";
// Crea una conección con la base de datos
$conn = new mysqli($direccion_basedatos, $usuario, $contra, $basedatos);

// Si existe un error lo muestra
if ($conn->connect_error) {
  die("Ocurrió un error al conectarsé a la base de datos");
}
?>
