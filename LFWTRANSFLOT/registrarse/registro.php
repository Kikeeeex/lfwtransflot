<?php
// Archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario de registro ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario del usuario
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $nombres = mysqli_real_escape_string($conexion, $_POST['nombres']);
    $apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conexion, $_POST['confirm-password']);

    // Obtener los datos del formulario de la empresa
    $nombre_empresa = mysqli_real_escape_string($conexion, $_POST['nombre-empresa']);
    $rif = mysqli_real_escape_string($conexion, $_POST['rif']);
    $telefonos = mysqli_real_escape_string($conexion, $_POST['telefonos']);
    $logo = mysqli_real_escape_string($conexion, $_POST['logo-empresa']);

    // Validar si las contraseñas coinciden
    if ($password != $confirm_password) {
        // Contraseñas no coinciden, muestra un mensaje de error
        $error = "Las contraseñas no coinciden.";
    } else {
        // Consulta SQL para insertar los datos del usuario en la base de datos
        $sql_usuario = "INSERT INTO usuario (nombre_usuario, apellido_usuario, correo_electronico, password) VALUES ('$usuario', '$apellidos', '$email', '$password')";

        // Ejecutar la consulta y verificar si fue exitosa
        if ($conexion->query($sql_usuario) === TRUE) {
            // Obtener el ID del último usuario insertado
            $id_usuario = $conexion->insert_id;

            // Consulta SQL para insertar los datos de la empresa en la base de datos
            $sql_empresa = "INSERT INTO empresa (nombre_empresa, rif, telefonos, logo, usuario_idusuario) VALUES ('$nombre_empresa', '$rif', '$telefonos', '$logo', '$id_usuario')";

            // Ejecutar la consulta y verificar si fue exitosa
            if ($conexion->query($sql_empresa) === TRUE) {
                // Registro exitoso, redirigir al usuario a la página de inicio de sesión
                header("location: login.php");
                exit(); // Es importante salir del script después de redirigir
            } else {
                // Si hubo un error en la consulta de la empresa, muestra un mensaje de error
                $error = "Error: " . $sql_empresa . "<br>" . $conexion->error;
            }
        } else {
            // Si hubo un error en la consulta del usuario, muestra un mensaje de error
            $error = "Error: " . $sql_usuario . "<br>" . $conexion->error;
        }
    }
}
?>
