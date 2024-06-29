<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transflotadb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, nombre FROM conductores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
    }
} else {
    echo "<option value=''>No hay conductores disponibles</option>";
}

$conn->close();
?>
