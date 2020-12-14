<?php
// Incluye la configuración de acceso a la base de datos desde el archivo
// coneccion.php
include 'coneccion.php';

// Define la variable $sql con una query de MYSQL pidiendo la contraseña del
// usuario que recibe el archivo
$sql = "SELECT contraseña FROM usuarios WHERE nombre_usuario = '" .
  $_POST["usuario"] . "'";
// Ejecuta la consulta
$result = $conn->query($sql);

// Si existe algun resultado
if ($result->num_rows > 0) {
  // Guarda el resultado en $row
  while ($row = $result->fetch_assoc()) {
    // Si la contraseña que esta en la base de datos coincide con la que se
    // recibe
    if ($row["contraseña"] == $_POST["contra"]) {
      // Te dirije a cafes.php
      header('Location: cafes.php');
    } else {
      // De lo contrario te regresa a index.php
      header('Location: index.php');
    }
  }
}
?>
