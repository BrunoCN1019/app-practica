<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Registro de Usuarios</h2>
    <form action="guardar.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Correo:</label>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>
