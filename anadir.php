<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Agregar</title>
  <link rel="stylesheet" href="https://unpkg.com/awsm.css@3.0.7/dist/awsm_theme_tasman.min.css">
</head>
<body>
<main>
<h1>Agregar café</h1>
<?php
$direccion_basedatos = "192.168.0.14";
$usuario = "juan";
$contra = "123";
$basedatos = "cafeteria";
$conn = new mysqli($direccion_basedatos, $usuario, $contra, $basedatos);

if ($conn->connect_error) {
  die("Ocurrió un error al conectarsé a la base de datos");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $add = "CALL crearCafes ('" . $_POST["nombre"] . "', '" . $_POST["tamano"] . "', '" . $_POST["precio"] . "', '" . $_POST["proveedor"] . "')";
  $conn->query($add);
  echo "Se añadió el café.";
}

$tamanos = "SELECT * FROM tamaños_cafe";
$proveedores = "SELECT * FROM proveedor";

$res_tamanos = $conn->query($tamanos);
$res_proveedores = $conn->query($proveedores);
?>
  <form action="anadir.php" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <label>Tamaño:</label>
    <select id="" name="tamano" required>
      <option value=""></option>
<?php
if ($res_tamanos->num_rows > 0) {
  while ($row = $res_tamanos->fetch_assoc()) {
?>
  <option value="<?php echo $row["cod_tamaño"];?>"><?php echo $row["nombre"];?></option>
<?php
  }
}
?>
    </select>
    <label>Precio:</label>
    <input type="number" name="precio" required>
    <label>Proveedor:</label>
    <select id="" name="proveedor" required>
      <option value=""></option>
<?php
if ($res_proveedores->num_rows > 0) {
  while ($row = $res_proveedores->fetch_assoc()) {
?>
  <option value="<?php echo $row["cod_proveedor"];?>"><?php echo $row["nombre"];?></option>
<?php
  }
}
?>
    </select>
<input type="submit" value="Añadir">
  </form>
</main>
</body>
</html>
