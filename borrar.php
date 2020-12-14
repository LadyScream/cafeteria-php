<?php include 'coneccion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Borrar</title>
  <link rel="stylesheet" href="https://unpkg.com/awsm.css@3.0.7/dist/awsm_theme_tasman.min.css">
</head>
<body>
  <main>
<?php
// Si el archivo es llamado con un metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Crea y ejecuta una consulta al metodo eliminarCafes con el codigo del cafe
  // actual
  $add = "CALL eliminarCafes ('". $_POST["cod"] ."')";
  $conn->query($add);
  echo "<h1>Se borró el café.</h1>";
} else {
?>
    <form action="borrar.php" method="POST" style="display:none;" id="form">
      <input type="text" value="<?php echo $_GET["cod"];?>" name="cod">
    </form>
    <h1>¿Esta seguro de que quiere borrar el café?</h1>
    <div style="display:flex; justify-content: space-around;">
        <a href="#" id="confirmar">Sí</a>
        <a href="cafes.php">No</a>
    </div>
  </main>
<script>
document.querySelector('#confirmar').addEventListener('click', () => {
  document.querySelector('#form').submit();
})
</script>
<?php
}
?>
</body>
</html>
