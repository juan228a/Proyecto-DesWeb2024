<?php
// Iniciar la sesión
session_start();

// Incluir archivo de conexión
include 'conexion.php';

// Variable para el mensaje
$mensaje = "";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['username'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $provincia = $_POST['provincia'];
    $ciudad = $_POST['ciudad'];

    // Verificar si las contraseñas coinciden
    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    // Verificar si el usuario ya existe
    $sql_check = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt_check = $conexion->prepare($sql_check);
    $stmt_check->bind_param("s", $usuario);
    $stmt_check->execute();
    $resultado_check = $stmt_check->get_result();

    if ($resultado_check->num_rows > 0) {
        die("El nombre de usuario ya existe.");
    }

    // Almacenar datos en sesión
    $_SESSION['signup_data'] = [
        'username' => $usuario,
        'nombre' => $nombre,
        'email' => $email,
        'telefono' => $telefono,
        'password' => $password,
        'provincia' => $provincia,
        'ciudad' => $ciudad
    ];

    // Redirigir a la segunda parte del registro
    header('Location: signup2.php');
    exit();
}

$conexion->close();
?>
