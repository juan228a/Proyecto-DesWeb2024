<?php
// Iniciar la sesión
session_start();

// Incluir archivo de conexión
include 'conexion.php';

// Variable para el mensaje
$mensaje = "";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los datos del primer formulario están en la sesión
    if (isset($_SESSION['signup_data'])) {
        // Obtener los datos del primer formulario desde la sesión
        $signup_data = $_SESSION['signup_data'];

        // Obtener los datos del segundo formulario
        $descripcion = $_POST['descripcion'];
        $facebook = $_POST['red1'];
        $twitter = $_POST['red2'];
        $instagram = $_POST['red3'];
        $direccion_local = $_POST['direccion_local'];
        $direccion_hogar = $_POST['direccion_hogar'];

        // Procesar la imagen
        $imagen = $_FILES['imagen']['name'];
        $target_dir = "../img-perfil/";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (usuario, nombre, email, telefono, password, provincia, ciudad, descripcion, red1, red2, red3, direccion_local, direccion_hogar, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        // Verificar si la preparación de la consulta SQL fue exitosa
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . htmlspecialchars($conexion->error));
        }

        $stmt->bind_param("ssssssssssssss", $signup_data['username'], $signup_data['nombre'], $signup_data['email'], $signup_data['telefono'], $signup_data['password'], $signup_data['provincia'], $signup_data['ciudad'], $descripcion, $facebook, $twitter, $instagram, $direccion_local, $direccion_hogar, $target_file);

        if ($stmt->execute()) {
            $mensaje = "Registro exitoso. ¡Bienvenido, " . $signup_data['username'] . "!";
            // Limpiar los datos de la sesión
            unset($_SESSION['signup_data']);
        } else {
            $mensaje = "Error en el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $mensaje = "No se encontraron los datos del primer formulario. Por favor, vuelve a empezar el proceso de registro.";
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Registro</title>
    <link rel="stylesheet" href="../css/signUp.css">
    <script>
        // Redirigir a login.html después de 3 segundos
        setTimeout(function(){
            window.location.href = '../html/login.html';
        }, 3000);
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <h2><?php echo $mensaje; ?></h2>
        </div>
    </div>
</body>
</html>
