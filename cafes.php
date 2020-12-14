<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cafés</title>
  <link rel="stylesheet" href="https://unpkg.com/awsm.css@3.0.7/dist/awsm_theme_tasman.min.css">
</head>
<body>
<?php
// Incluye la configuración para conectarse a la base de datos del archivo
// coneccion.php
include 'coneccion.php';

// Define una consulta para obtener todos los cafés
$sql = "SELECT * FROM cafes";
// Ejecuta esa consulta
$result = $conn->query($sql);
// Define otra consulta para obtener el número actual de la actualizacion
$cod_act = "SELECT cuenta FROM actualizaciones WHERE cod_actualizacion = '1'";
// Ejecuta la consulta
$res_cod = $conn->query($cod_act);
// Guarda el resultado en la variable $cod
$cod = $res_cod->fetch_assoc();
?>

<main>
<h1>Cafés</h1>
<!-- Agrega un link hacia anadir.php -->
<a href="anadir.php">Agregar nuevo</a>
<!-- Define una tabla donde se guardarán los cafés -->
<table>
  <thead>
    <tr>
      <th>Código Café</th>
      <th>Nombre</th>
      <th>Tamaño</th>
      <th>Precio</th>
      <th>Proveedor</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
<?php
// Si existen cafés
if ($result->num_rows > 0) {
  // Por cada café incluye una fila de la tabla
  while ($row = $result->fetch_assoc()) {
    // En la fila se incluye:
    // * cod_cafe
    // * nombre
    // * tamaño
    // * precio
    // * proveedor
    // * Botones para editar y borrar
?>
    <tr>
      <td><?php echo $row["cod_cafe"];?></td>
      <td><?php echo $row["nombre"];?></td>
      <td><?php echo $row["tamaño"];?></td>
      <td><?php echo $row["precio"];?></td>
      <td><?php echo $row["proveedor"];?></td>
      <td>
        <a href="editar.php?cod=<?php echo $row["cod_cafe"];?>">Editar</a>
        <br>
        <a href="borrar.php?cod=<?php echo $row["cod_cafe"];?>">Borrar</a>
      </td>
    </tr>
<?php
  }
}
?>
  </tbody>
</table>
</main>
<script>
// Guarda el código de la actualización actual en la variable cod_actualizacion
const cod_actualizacion = <?php echo $cod["cuenta"]; ?>;
// Define una función que se ejecutará cada segundo
setInterval(() => {
// Llama al archivo actualizacion.php que se encarga de mostrar el numero actual
// de la actualizacion
fetch('actualizacion.php').then(res => res.text()).then(text => {
// Si el numero actual no coincide con el que se tiene guardado
  if (cod_actualizacion != text) {
    // Recarga la página
    location.reload();
  }
});
}, 1000);
</script>
</body>
</html>
