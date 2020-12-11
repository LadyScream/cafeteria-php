<?php
$direccion_basedatos = "192.168.0.14";
$usuario = "juan";
$contra = "123";
$basedatos = "cafeteria";
$conn = new mysqli($direccion_basedatos, $usuario, $contra, $basedatos);

if ($conn->connect_error) {
  die("Ocurrió un error al conectarsé a la base de datos");
}

$sql = "SELECT contraseña FROM usuarios WHERE nombre_usuario = '" . $_POST["usuario"] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row["contraseña"] == $_POST["contra"]) {
      header('Location: cafes.php');
    } else {
      header('Location: index.php');
    }
  }
}
?>
