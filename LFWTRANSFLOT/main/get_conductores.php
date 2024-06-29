<?php
include 'conexion.php';

$sql = "SELECT * FROM conductores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['nacimiento']}</td>
                <td>{$row['cedula']}</td>
                <td>{$row['vencimiento_licencia']}</td>
                <td>{$row['vencimiento_carta_medica']}</td>
                <td>
                    <button class='btn btn-warning edit-conductor' data-id='{$row['id']}' data-nombre='{$row['nombre']}' data-apellido='{$row['apellido']}' data-nacimiento='{$row['nacimiento']}' data-cedula='{$row['cedula']}' data-vencimiento_licencia='{$row['vencimiento_licencia']}' data-vencimiento_carta_medica='{$row['vencimiento_carta_medica']}'>Editar</button>
                    <button class='btn btn-danger delete-conductor' data-id='{$row['id']}'>Eliminar</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay conductores registrados</td></tr>";
}

$conn->close();
?>
