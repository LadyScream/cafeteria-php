<?php
// Incluye el archivo de configuración para acceder a la base de datos
include 'coneccion.php';
// Define una consulta para obtener el codigo de la actualizacion actual
$cod_act = "SELECT cuenta FROM actualizaciones WHERE cod_actualizacion = '1'";
// Ejecuta la consulta
$res_cod = $conn->query($cod_act);
// Guarda el resultado en la variable $cod
$cod = $res_cod->fetch_assoc();
// Imprime la variable $cod
echo $cod["cuenta"];
?>
