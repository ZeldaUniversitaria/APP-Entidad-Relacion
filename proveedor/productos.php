<?php include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Inventario de Productos</title>
<style>
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    margin: 0;
    background: #f4f6f8;
    color: #333;
    padding: 40px;
  }

  h2 {
    text-align: center;
    color: #2E7D32;
    font-size: 26px;
    margin-bottom: 20px;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    background: white;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  th, td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
  }

  th {
    background: #4CAF50;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  tr:hover {
    background-color: #f1f8e9;
  }

  td {
    font-size: 15px;
  }

  .acciones {
    text-align: center;
    margin-top: 25px;
  }

  .acciones a {
    text-decoration: none;
    color: white;
    background: #4CAF50;
    padding: 10px 18px;
    border-radius: 8px;
    margin: 0 10px;
    font-weight: bold;
    transition: 0.3s;
  }

  .acciones a:hover {
    background: #388E3C;
  }

  .sin-productos {
    text-align: center;
    color: #888;
    font-style: italic;
    padding: 20px;
  }
</style>
</head>
<body>

<h2>Inventario de Productos</h2>

<table>
  <tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Existencias</th>
    <th>Proveedor</th>
  </tr>
  <?php
  $sql = "SELECT 
            p.codigo, p.nombre, p.precio, p.existencias, 
            pr.nombre AS proveedor 
          FROM producto p 
          JOIN proveedor pr ON pr.nif = p.nif_proveedor";
  $res = $conn->query($sql);

  if ($res->num_rows > 0) {
      while ($r = $res->fetch_assoc()) {
          echo "<tr>
                  <td>{$r['codigo']}</td>
                  <td>{$r['nombre']}</td>
                  <td>$ ".number_format($r['precio'], 2)."</td>
                  <td>{$r['existencias']}</td>
                  <td>{$r['proveedor']}</td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='5' class='sin-productos'>No hay productos registrados.</td></tr>";
  }
  ?>
</table>

<div class="acciones">
  <a href="producto_alta.php">Registrar nuevo producto</a>
  <a href="../index.php">Volver al menú principal</a>
</div>

</body>
</html>
