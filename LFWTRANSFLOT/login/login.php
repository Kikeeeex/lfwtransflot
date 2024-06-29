<?php
// Archivo de conexión a la base de datos
include('conexion.php');

// Iniciar la sesión
session_start();

// Verificar si el formulario de inicio de sesión ha sido enviado
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT idusuario, nombre_usuario FROM usuarios WHERE (nombre_usuario = '$usuario' OR correo_electronico = '$usuario') AND password = '$password'";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    $count = mysqli_num_rows($resultado);

    // Si se encontró un usuario con las credenciales proporcionadas
    if($count == 1) {
        // Almacenar variables de sesión
        $_SESSION['login_user'] = $fila['nombre_usuario'];
        $_SESSION['id_user'] = $fila['idusuario'];

        // Redirigir al usuario a la página de inicio después de iniciar sesión
        header("location: pagina_principal/sesion_iniciada.php");
    } else {
        // Mensaje de error si las credenciales son incorrectas
        $error = "Nombre de usuario, correo electrónico o contraseña incorrectos.";
    }
}
?>
