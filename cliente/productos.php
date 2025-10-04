<?php include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Catálogo de Productos</title>
<style>
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    margin: 0;
    background: #f4f6f8;
    color: #333;
  }

  header {
    background: #4CAF50;
    color: white;
    padding: 20px 0;
    text-align: center;
    font-size: 24px;
    letter-spacing: 1px;
  }

  .contenedor {
    max-width: 1100px;
    margin: 40px auto;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 25px;
    padding: 0 20px;
  }

  .card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.2s;
  }
  .card:hover {
    transform: scale(1.03);
  }

  .card h3 {
    margin: 0 0 10px;
    font-size: 18px;
    color: #2E7D32;
  }

  .card p {
    margin: 5px 0;
  }

  .card .precio {
    font-size: 18px;
    font-weight: bold;
    color: #388E3C;
  }

  .card input[type="number"] {
    width: 70px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    text-align: center;
  }

  .card label {
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
  }

  .card .agregar {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 8px 10px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    margin-top: 10px;
    transition: 0.3s;
  }
  .card .agregar:hover {
    background: #388E3C;
  }

  button.flotante {
    position: fixed;
    bottom: 25px;
    right: 25px;
    background: #FF4081;
    color: white;
    border: none;
    padding: 16px 26px;
    border-radius: 50px;
    font-size: 18px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.25);
    cursor: pointer;
    transition: 0.3s;
  }

  button.flotante:hover {
    background: #F50057;
  }

  @media (max-width: 600px) {
    header { font-size: 20px; }
    .card { padding: 15px; }
  }
</style>
</head>
<body>

<header>Catálogo de Productos</header>

<form method="post" action="finalizar_compra.php">
  <div class="contenedor">
    <?php
    $sql = "SELECT 
          p.codigo, p.nombre, p.precio, COALESCE(p.existencias,0) AS existencias,
          pr.nombre AS proveedor
        FROM producto p 
        JOIN proveedor pr ON p.nif_proveedor = pr.nif";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        echo "
        <div class='card'>
          <h3>{$row['nombre']}</h3>
          <p><b>Proveedor:</b> {$row['proveedor']}</p>
          <p class='precio'>$".number_format($row['precio'],2)." MXN</p>
          <p><b>Disponibles:</b> {$row['existencias']} unidades</p>
          <label>
            <input type='checkbox' name='codigo[]' value='{$row['codigo']}'> Seleccionar
          </label>
          <label>Cantidad:</label>
          <input type='number' name='cantidad[{$row['codigo']}]' value='1' min='1'>
          <button type='button' class='agregar' onclick='toggleCheck(this)'>Agregar</button>
        </div>";
      }
    } else {
      echo "<p>No hay productos disponibles.</p>";
    }
    ?>
  </div>

  <button class="flotante" type="submit">Finalizar compra</button>
</form>

<script>
  function toggleCheck(btn){
    let card = btn.closest('.card');
    let checkbox = card.querySelector('input[type=checkbox]');
    checkbox.checked = !checkbox.checked;
    btn.textContent = checkbox.checked ? 'Agregado' : 'Agregar';
    btn.style.background = checkbox.checked ? '#2E7D32' : '#4CAF50';
  }
</script>

</body>
</html>
