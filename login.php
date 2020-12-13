<?php
include 'coneccion.php';

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
