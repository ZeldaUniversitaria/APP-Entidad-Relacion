<?php include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de Cliente</title>
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

  input[type="number"],
  input[type="text"],
  input[type="date"],
  input[type="tel"] {
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
</style>
</head>
<body>

<header>Registro de Cliente</header>

<div class="container">
  <form method="post">
    <label>DNI</label>
    <input type="number" name="dni" required>

    <label>Nombre completo</label>
    <input type="text" name="nombre" required>

    <label>Fecha de nacimiento</label>
    <input type="date" name="fecha_na" required>

    <label>Teléfono</label>
    <input type="tel" name="tfno" pattern="[0-9]{10}" maxlength="10" placeholder="Ej. 6561234567" required>

    <button type="submit">Registrar y continuar</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
      $dni = $_POST['dni'];
      $nombre = $_POST['nombre'];
      $fecha_na = $_POST['fecha_na'];
      $tfno = $_POST['tfno'];

      // Validar si el cliente ya existe
      $check = $conn->query("SELECT dni FROM cliente WHERE dni = '$dni'");
      if ($check->num_rows > 0) {
          echo "<p class='mensaje' style='color:#C62828;'>Ya existe un cliente con este DNI. Redirigiendo al catálogo...</p>";
          echo "<script>setTimeout(() => { window.location.href = 'productos.php'; }, 2000);</script>";
      } else {
          $sql = "INSERT INTO cliente (dni, nombre, fecha_na, tfno)
                  VALUES ('$dni', '$nombre', '$fecha_na', '$tfno')";
          if ($conn->query($sql)) {
              echo "<p class='mensaje' style='color:#2E7D32;'>Cliente registrado correctamente. Redirigiendo al catálogo...</p>";
              echo "<script>setTimeout(() => { window.location.href = 'productos.php'; }, 2000);</script>";
          } else {
              echo "<p class='mensaje' style='color:#C62828;'>Error: ".$conn->error."</p>";
          }
      }
  }
  ?>

  <div class="acciones">
    <a href="../index.php">Volver al menú</a>
  </div>
</div>

</body>
</html>
