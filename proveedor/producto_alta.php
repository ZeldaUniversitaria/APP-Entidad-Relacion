<?php include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de Producto</title>
<style>
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f4f6f8;
    margin: 0;
  }

  header {
    background: #4CAF50;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 22px;
  }

  .container {
    max-width: 600px;
    background: white;
    margin: 50px auto;
    padding: 35px;
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

  input[type="number"], input[type="text"], select {
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

<header>Registro de Producto</header>

<div class="container">
  <form method="post">
    <label>Código del producto</label>
    <input type="number" name="codigo" required>

    <label>Nombre del producto</label>
    <input type="text" name="nombre" required>

    <label>Precio (MXN)</label>
    <input type="number" step="0.01" name="precio" required>

    <label>Existencias en bodega</label>
    <input type="number" name="existencias" required min="0">

    <label>Proveedor</label>
    <select name="nif_proveedor" required>
      <option value="">Seleccione un proveedor</option>
      <?php
      $res=$conn->query("SELECT nif,nombre FROM proveedor ORDER BY nombre");
      while($row=$res->fetch_assoc()){
          echo "<option value='{$row['nif']}'>{$row['nombre']}</option>";
      }
      ?>
    </select>

    <button type="submit">Registrar producto</button>
  </form>

  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
      $codigo=$_POST['codigo'];
      $nombre=$_POST['nombre'];
      $precio=$_POST['precio'];
      $existencias=$_POST['existencias'];
      $nif_proveedor=$_POST['nif_proveedor'];

      $sql="INSERT INTO producto (codigo,nombre,precio,existencias,nif_proveedor)
            VALUES ('$codigo','$nombre','$precio','$existencias','$nif_proveedor')";
      if($conn->query($sql)){
          echo "<p class='mensaje' style='color:#2E7D32;'>Producto registrado correctamente.</p>";
      } else {
          echo "<p class='mensaje' style='color:#C62828;'>Error: ".$conn->error."</p>";
      }
  }
  ?>

  <a class="volver" href="../index.php">← Volver al menú principal</a>
</div>

</body>
</html>
