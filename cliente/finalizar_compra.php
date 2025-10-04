<?php include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Resumen de Compra</title>
<style>
body {
  font-family: Arial, sans-serif;
  background: #f4f6f9;
  margin: 0;
  padding: 40px;
  text-align: center;
}
h2 { color: #333; margin-bottom: 10px; }
table {
  border-collapse: collapse;
  width: 80%;
  margin: 20px auto;
  background: white;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
th, td {
  padding: 12px;
  border-bottom: 1px solid #ddd;
  text-align: left;
}
th { background: #4CAF50; color: white; }
.total {
  font-weight: bold;
  background: #e8f5e9;
}
form { margin-top: 30px; }
button {
  background: #FF4081;
  color: white;
  border: none;
  padding: 12px 30px;
  font-size: 16px;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.3s;
}
button:hover { background: #F50057; }

.volver {
  display: inline-block;
  text-decoration: none;
  background: #4CAF50;
  color: white;
  padding: 12px 25px;
  border-radius: 8px;
  font-weight: bold;
  transition: 0.3s;
  margin-top: 25px;
}
.volver:hover { background: #388E3C; }

.message {
  margin-top: 20px;
  font-size: 18px;
  color: #333;
}
</style>
</head>
<body>

<h2>Resumen de tu compra</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['codigo'])) {
    $codigos = $_POST['codigo'];
    $cantidades = $_POST['cantidad'];
    $productos = [];
    $total = 0;

    echo "<table><tr><th>Producto</th><th>Precio Unitario</th><th>Cantidad</th><th>Subtotal</th></tr>";

    foreach ($codigos as $codigo) {
        $sql = "SELECT nombre, precio FROM producto WHERE codigo = $codigo";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) {
            $prod = $res->fetch_assoc();
            $nombre = $prod['nombre'];
            $precio = $prod['precio'];
            $cantidad = intval($cantidades[$codigo]);
            $subtotal = $precio * $cantidad;
            $total += $subtotal;

            echo "<tr>
                    <td>$nombre</td>
                    <td>$".number_format($precio, 2)."</td>
                    <td>$cantidad</td>
                    <td>$".number_format($subtotal, 2)."</td>
                  </tr>";

            $productos[] = [
                'codigo' => $codigo,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal
            ];
        }
    }

    echo "<tr class='total'><td colspan='3'>TOTAL</td><td>$".number_format($total,2)."</td></tr></table>";
?>
    <form method="post" action="">
        <input type="hidden" name="productos_json" value='<?= json_encode($productos) ?>'>
        <input type="hidden" name="total" value="<?= $total ?>">
        <button type="submit" name="registrar">Registrar Compra</button>
    </form>

<?php
} elseif (isset($_POST['registrar'])) {
    $productos = json_decode($_POST['productos_json'], true);
    $total = floatval($_POST['total']);
    $fecha = date("Y-m-d");

    foreach ($productos as $item) {
        $codigo = $item['codigo'];
        $cantidad = $item['cantidad'];
        $subtotal = $item['subtotal'];

        // Guardar compra (sin DNI)
        $conn->query("INSERT INTO compras (dni_cliente, codigo_producto, fecha, cantidad, total)
                      VALUES (NULL, $codigo, '$fecha', $cantidad, $subtotal)");

        // Actualizar existencias
        $conn->query("UPDATE producto 
                      SET existencias = GREATEST(existencias - $cantidad, 0)
                      WHERE codigo = $codigo");
    }

    echo "<div class='message'>
          ¡Compra registrada exitosamente!<br>
          Total: <b>$".number_format($total,2)."</b> pesos.<br><br>
                    </div>";

    echo "<a class='volver' href='../index.php'>Regresar al menú principal</a>";
} else {
    echo "<p>No seleccionaste productos o accediste directamente a esta página.</p>";
}
?>
</body>
</html>
