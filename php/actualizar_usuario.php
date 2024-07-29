<?php
// Iniciar la sesión
session_start();

// Incluir archivo de conexión
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $red1 = $_POST['red1'];
    $red2 = $_POST['red2'];
    $red3 = $_POST['red3'];
    $direccion_local = $_POST['direccion_local'];
    $direccion_hogar = $_POST['direccion_hogar'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];

    // Procesar la imagen (si se ha subido una nueva)
    if (!empty($_FILES['imagen']['name'])) {
        $imagen = $_FILES['imagen']['name'];
        $target_dir = "../img-perfil/";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
    } else {
        // Mantener la imagen actual si no se sube una nueva
        $sql = "SELECT imagen FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($target_file);
        $stmt->fetch();
        $stmt->close();
    }

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios SET nombre = ?, red1 = ?, red2 = ?, red3 = ?, direccion_local = ?, direccion_hogar = ?, telefono = ?, descripcion = ?, imagen = ? WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssss", $nombre, $red1, $red2, $red3, $direccion_local, $direccion_hogar, $telefono, $descripcion, $target_file, $username);

    if ($stmt->execute()) {
        $mensaje = "Actualización exitosa.";
    } else {
        $mensaje = "Error en la actualización: " . $stmt->error;
    }

    $stmt->close();
} else {
    $mensaje = "No has iniciado sesión.";
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Actualización</title>
    <link rel="stylesheet" href="../css/editoruser.css">
    <script>
        // Redirigir a editoruser.php después de 3 segundos
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 2000);
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
