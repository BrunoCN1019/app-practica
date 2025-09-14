<?php
// Configuración de conexión a SQL Server
$serverName = "TU_SERVIDOR";  // Ej. localhost o el host que te da Render
$connectionOptions = array(
    "Database" => "practicasegura",
    "Uid" => "TU_USUARIO",
    "PWD" => "TU_PASSWORD"
);

// Conectar a SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn === false){
    die(print_r(sqlsrv_errors(), true));
}

// Validar que llegaron los datos del formulario
if(isset($_POST['nombre'], $_POST['email'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Sentencia preparada para evitar inyección SQL
    $tsql = "INSERT INTO usuarios (nombre, email) VALUES (?, ?)";
    $params = array($nombre, $email);

    $stmt = sqlsrv_query($conn, $tsql, $params);

    if($stmt){
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar usuario:";
        die(print_r(sqlsrv_errors(), true));
    }
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
