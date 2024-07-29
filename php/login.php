<?php
// Incluir archivo de conexión
include 'conexion.php';

// Variable para el mensaje
$mensaje = "";

// Iniciar la sesión
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos de username y password están en $_POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los datos del formulario
        $usuario = $_POST['username'];
        $password = $_POST['password'];

        // Consulta para verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Obtener los datos del usuario
            $fila = $resultado->fetch_assoc();
            if ($fila['password'] === $password) {
                // Guardar los datos del usuario en la sesión
                $_SESSION['username'] = $fila['usuario'];
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['email'] = $fila['email'];
                $_SESSION['telefono'] = $fila['telefono'];
                $_SESSION['provincia'] = $fila['provincia'];
                $_SESSION['ciudad'] = $fila['ciudad'];

                $mensaje = "Inicio de sesión exitoso. ¡Bienvenido, " . htmlspecialchars($fila['usuario']) . "!";
            } else {
                $mensaje = "Contraseña incorrecta.";
            }
        } else {
            $mensaje = "Usuario no encontrado.";
        }

        $stmt->close();
    } else {
        $mensaje = "Campos de usuario o contraseña no establecidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <script>
        // Redirigir a index.php después de 3 segundos
        setTimeout(function(){
            window.location.href = 'index.php';
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
