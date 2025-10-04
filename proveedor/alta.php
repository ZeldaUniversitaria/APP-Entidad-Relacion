<?php include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de Proveedor</title>
<style>
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f4f6f8;
    margin: 0;
    padding: 0;
  }

  header {
    background: #4CAF50;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 22px;
    letter-spacing: 1px;
  }

  .container {
    max-width: 500px;
    background: white;
    margin: 50px auto;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
    color: #555;
  }

  input[type="number"], input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-top: 5px;
    font-size: 15px;
  }

  button {
    width: 100%;
    background: #4CAF50;
    color: white;
    border: none;
    padding: 12px;
    font-size: 16px;
    border-radius: 8px;
    margin-top: 25px;
    cursor: pointer;
    transition: 0.3s;
  }

  button:hover {
    background: #388E3C;
  }

  .mensaje {
    margin-top: 20px;
    text-align: center;
    font-weight: bold;
  }

  .acciones {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 25px;
  }

  .acciones a {
    flex: 1;
    text-decoration: none;
    text-align: center;
    background: #4CAF50;
    color: white;
    padding: 12px;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
  }

  .acciones a:hover {
    background: #388E3C;
  }

  a.volver {
    display: inline-block;
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
    margin-top: 15px;
    text-align: center;
    width: 100%;
  }
</style>
</head>
<body>

<header>Registro de Proveedor</header>

<div class="container">
  <form method="post">
    <label>NIF del proveedor</label>
    <input type="number" name="nif" required>

    <label>Nombre del proveedor</label>
    <input type="text" name="nombre" required>

    <label>Dirección</label>
    <input type="text" name="direccion" required>

    <button type="submit">Registrar proveedor</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"]=="POST"){
      $nif=$_POST['nif'];
      $nombre=$_POST['nombre'];
      $direccion=$_POST['direccion'];

      $sql="INSERT INTO proveedor (nif,nombre,direccion) VALUES ('$nif','$nombre','$direccion')";
      if($conn->query($sql)){
          echo "<p class='mensaje' style='color:#2E7D32;'>Proveedor registrado correctamente.</p>";
      } else {
          echo "<p class='mensaje' style='color:#C62828;'>Error: ".$conn->error."</p>";
      }
  }
  ?>

  <div class="acciones">
    <a href="productos.php">Ver productos</a>
    <a href="producto_alta.php">Registrar producto</a>
  </div>

  <a class="volver" href="../index.php">← Volver al menú principal</a>
</div>

</body>
</html>
