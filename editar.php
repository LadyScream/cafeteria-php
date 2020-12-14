<?php
// ESTE ARCHIVO HACE BASICAMENTE LO MISMO QUE AÑADIR SOLO QUE LLAMA AL METODO
// EDITARCAFE Y MUESTRA LOS DATOS DEL CAFE ACTUAL
include 'coneccion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editar</title>
  <link rel="stylesheet" href="https://unpkg.com/awsm.css@3.0.7/dist/awsm_theme_tasman.min.css">
</head>
<body>
<main>
<h1>Editar café</h1>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $add = "CALL editarCafe ('" . $_POST["nombre"] . "', '" . $_POST["tamano"] . "', '" . $_POST["precio"] . "', '" . $_POST["proveedor"] . "', '". $_POST["codigo"]."')";
  $conn->query($add);
  echo "Se editó el café.";
}

$cafe = "SELECT * FROM cafes WHERE cod_cafe = '" . $_GET["cod"] . "'";
$tamanos = "SELECT * FROM tamaños_cafe";
$proveedores = "SELECT * FROM proveedor";

$res_tamanos = $conn->query($tamanos);
$res_proveedores = $conn->query($proveedores);
$res_cafe = $conn->query($cafe);


if ($res_cafe->num_rows > 0) {
  while ($caf = $res_cafe->fetch_assoc()) {
?>
  <form action="editar.php" method="POST">
    <input type="text" name="codigo" value="<?php echo $caf["cod_cafe"];?>" style="display:none;">
    <label>Nombre:</label>
    <input type="text" name="nombre" required value="<?php echo $caf["nombre"];?>">
    <label>Tamaño:</label>
    <select id="" name="tamano" required>
      <option value=""></option>
<?php
if ($res_tamanos->num_rows > 0) {
  while ($row = $res_tamanos->fetch_assoc()) {
?>
  <option value="<?php echo $row["cod_tamaño"];?>" <?php if ($row["cod_tamaño"] == $caf["tamaño"]) echo 'selected';?>><?php echo $row["nombre"];?></option>
<?php
  }
}
?>
    </select>
    <label>Precio:</label>
    <input type="number" name="precio" required value="<?php echo $caf["precio"];?>">
    <label>Proveedor:</label>
    <select id="" name="proveedor" required>
      <option value=""></option>
<?php
if ($res_proveedores->num_rows > 0) {
  while ($row = $res_proveedores->fetch_assoc()) {
?>
  <option value="<?php echo $row["cod_proveedor"];?>" <?php if ($row["cod_proveedor"] == $caf["proveedor"]) echo 'selected';?>><?php echo $row["nombre"];?></option>
<?php
  }
}
?>
    </select>
<input type="submit" value="Editar">
  </form>
<?php
  }
}?>
</main>
</body>
</html>
