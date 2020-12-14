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
// Incluye la configuracion para conectar a la base de datos
include 'coneccion.php';

// Si este archivo es llamado con un metodo POST entonces
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Crea una consulta donde se llama la funcion crearCafes
  $add = "CALL crearCafes ('" . $_POST["nombre"] . "', '" . $_POST["tamano"] . "', '" . $_POST["precio"] . "', '" . $_POST["proveedor"] . "')";
  // Se ejecuta la consulta
  $conn->query($add);
  // Y se muestra que se añadió
  echo "Se añadió el café.";
}

// Obtiene tamaños y proveedores para mostrarlos como opciones
$tamanos = "SELECT * FROM tamaños_cafe";
$proveedores = "SELECT * FROM proveedor";

$res_tamanos = $conn->query($tamanos);
$res_proveedores = $conn->query($proveedores);
?>
<!-- Define el formulario donde se introducirán los datos del café -->
  <form action="anadir.php" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <label>Tamaño:</label>
    <select id="" name="tamano" required>
      <option value=""></option>
<?php
// Si existen tamaños
if ($res_tamanos->num_rows > 0) {
  while ($row = $res_tamanos->fetch_assoc()) {
    // Añade cada uno de los tamaños a la lista de tamaños disponibles
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
// Si existen proveedores
if ($res_proveedores->num_rows > 0) {
  while ($row = $res_proveedores->fetch_assoc()) {
    // Añade cada uno de los proveedores a la lista de proveedores disponibles
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
