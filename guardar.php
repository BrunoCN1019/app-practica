<?php
$servername = "TU_HOST";
$username   = "TU_USUARIO";
$password   = "TU_PASSWORD";
$dbname     = "TU_DB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['nombre'], $_POST['email'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "Usuario registrado correctamente.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

