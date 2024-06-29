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

$sql = "SELECT vehiculos.*, conductores.nombre AS conductor_nombre FROM vehiculos
        LEFT JOIN conductores ON vehiculos.conductor_id = conductores.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['marca']}</td>
                <td>{$row['modelo']}</td>
                <td>{$row['año']}</td>
                <td>{$row['matricula']}</td>
                <td>{$row['color']}</td>
                <td>{$row['estado']}</td>
                <td>{$row['conductor_nombre']}</td>
                <td>{$row['fecha_asig']}</td>
                <td>{$row['fecha_mantenimiento']}</td>
                <td>
                    <button class='btn btn-sm btn-warning edit-vehiculo' data-id='{$row['id']}'>Editar</button>
                    <button class='btn btn-sm btn-danger delete-vehiculo' data-id='{$row['id']}'>Eliminar</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='11'>No hay vehículos registrados.</td></tr>";
}

$conn->close();
?>


