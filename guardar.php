<?php
$servername = "TU_HOST";
$username   = "TU_USUARIO";
$password   = "TU_PASSWORD";
$dbname     = "TU_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if(isset($_POST['nombre'], $_POST['email'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $email);

    if($stmt->execute()){
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar usuario: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

