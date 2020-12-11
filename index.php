<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cafetería - Iniciar sesión</title>
  <link rel="stylesheet" href="https://unpkg.com/awsm.css@3.0.7/dist/awsm_theme_tasman.min.css">
</head>
<body>
<main>

<h1>Iniciar Sesión</h1>
  <form action="login.php" method="POST">
    <label for="usuario">Nombre de usuario:</label>
    <input type="text" id="usuario" name="usuario">
    <label for="contra">Contraseña:</label>
    <input type="password" id="contra" name="contra">
    <input type="submit" value="Iniciar Sesión">
  </form>
</main>
</body>
</html>
