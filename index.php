<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenido - Comercio</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg, #5f5fc5ff, #170c45ff);
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    margin: 0;
}
h1 { margin-bottom: 20px; font-size: 2em; }
.buttons {
    display: flex;
    gap: 30px;
}
a {
    text-decoration: none;
    padding: 20px 40px;
    border-radius: 12px;
    font-size: 20px;
    font-weight: bold;
    transition: 0.3s;
}
a.cliente { background: #FFD54F; color: #333; }
a.cliente:hover { background: #FFEE58; }
a.proveedor { background: #81D4FA; color: #333; }
a.proveedor:hover { background: #4FC3F7; }
</style>
</head>
<body>
    <h1>Bienvenido al Sistema de Compras</h1>
    <p>Por favor selecciona tu tipo de usuario:</p>

    <div class="buttons">
        <a href="cliente/registro_cliente.php" class="cliente">Soy Cliente</a>
        <a href="proveedor/alta.php" class="proveedor">Soy Proveedor</a>
    </div>
</body>
</html>
