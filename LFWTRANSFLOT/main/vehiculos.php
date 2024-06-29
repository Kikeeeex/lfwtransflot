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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $año = $_POST['año'];
        $matricula = $_POST['matricula'];
        $color = $_POST['color'];
        $estado = $_POST['estado'];
        $conductor_id = $_POST['conductor_id'];
        $fecha_asig = $_POST['fecha_asig'];
        $fecha_mantenimiento = $_POST['fecha_mantenimiento'];

        $sql = "INSERT INTO vehiculos (marca, modelo, año, matricula, color, estado, conductor_id, fecha_asig, fecha_mantenimiento) VALUES ('$marca', '$modelo', '$año', '$matricula', '$color', '$estado', '$conductor_id', '$fecha_asig', '$fecha_mantenimiento')";
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo vehículo creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $año = $_POST['año'];
        $matricula = $_POST['matricula'];
        $color = $_POST['color'];
        $estado = $_POST['estado'];
        $conductor_id = $_POST['conductor_id'];
        $fecha_asig = $_POST['fecha_asig'];
        $fecha_mantenimiento = $_POST['fecha_mantenimiento'];

        $sql = "UPDATE vehiculos SET marca='$marca', modelo='$modelo', año='$año', matricula='$matricula', color='$color', estado='$estado', conductor_id='$conductor_id', fecha_asig='$fecha_asig', fecha_mantenimiento='$fecha_mantenimiento' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Vehículo actualizado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        $sql = "DELETE FROM vehiculos WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Vehículo eliminado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

