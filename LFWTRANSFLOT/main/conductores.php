<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'create') {
        $stmt = $conn->prepare("INSERT INTO conductores (nombre, apellido, nacimiento, cedula, vencimiento_licencia, vencimiento_carta_medica) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $_POST['nombre'], $_POST['apellido'], $_POST['nacimiento'], $_POST['cedula'], $_POST['vencimiento_licencia'], $_POST['vencimiento_carta_medica']);
        
        if ($stmt->execute()) {
            echo "Nuevo conductor creado exitosamente";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif ($_POST['action'] === 'update') {
        $stmt = $conn->prepare("UPDATE conductores SET nombre=?, apellido=?, nacimiento=?, cedula=?, vencimiento_licencia=?, vencimiento_carta_medica=? WHERE id=?");
        $stmt->bind_param("ssssssi", $_POST['nombre'], $_POST['apellido'], $_POST['nacimiento'], $_POST['cedula'], $_POST['vencimiento_licencia'], $_POST['vencimiento_carta_medica'], $_POST['id']);
        
        if ($stmt->execute()) {
            echo "Conductor actualizado exitosamente";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif ($_POST['action'] === 'delete') {
        $stmt = $conn->prepare("DELETE FROM conductores WHERE id=?");
        $stmt->bind_param("i", $_POST['id']);
        
        if ($stmt->execute()) {
            echo "Conductor eliminado exitosamente";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
header("Location: conductores.html");
exit();
?>

