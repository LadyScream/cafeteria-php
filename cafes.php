<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cafés</title>
  <link rel="stylesheet" href="https://unpkg.com/awsm.css@3.0.7/dist/awsm_theme_tasman.min.css">
</head>
<body>
<?php
$direccion_basedatos = "192.168.0.14";
$usuario = "juan";
$contra = "123";
$basedatos = "cafeteria";
$conn = new mysqli($direccion_basedatos, $usuario, $contra, $basedatos);

if ($conn->connect_error) {
  die("Ocurrió un error al conectarsé a la base de datos");
}

$sql = "SELECT * FROM cafes";
$result = $conn->query($sql);

?>

<main>
<h1>Cafés</h1>

<a href="anadir.php">Agregar nuevo</a>
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
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
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
</body>
</html>
