<?php
include 'coneccion.php';
$cod_act = "SELECT cuenta FROM actualizaciones WHERE cod_actualizacion = '1'";
$res_cod = $conn->query($cod_act);
$cod = $res_cod->fetch_assoc();
echo $cod["cuenta"];
?>
