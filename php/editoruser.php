<?php
// Iniciar la sesión
session_start();

// Incluir archivo de conexión
include 'conexion.php';

// Inicializar variables para almacenar los datos del usuario
$nombre = $red1 = $red2 = $red3 = $direccion_local = $direccion_hogar = $telefono = $descripcion = "";

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Recuperar los datos del usuario de la base de datos
    $sql = "SELECT nombre, red1, red2, red3, direccion_local, direccion_hogar, telefono, descripcion FROM usuarios WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($nombre, $red1, $red2, $red3, $direccion_local, $direccion_hogar, $telefono, $descripcion);
    $stmt->fetch();
    $stmt->close();
} else {
    // Si no ha iniciado sesión, redirigir a la página de login
    header("Location: ../html/login.html");
    exit();
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Perfil</title>
    <link rel="stylesheet" href="../css/editoruser.css">
</head>
<body>
    <form action="actualizar_usuario.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
            <input type="text" name="nombre" placeholder="Nombre de usuario" value="<?php echo htmlspecialchars($nombre); ?>" required>
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-box">
            <input type="text" name="red1" placeholder="Instagram" value="<?php echo htmlspecialchars($red1); ?>" required>
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-box">
            <input type="text" name="red2" placeholder="Facebook" value="<?php echo htmlspecialchars($red2); ?>" required>
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-box">
            <input type="text" name="red3" placeholder="Twitter" value="<?php echo htmlspecialchars($red3); ?>" required>
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-box">
            <input type="text" name="direccion_local" placeholder="Dirección (Local)" value="<?php echo htmlspecialchars($direccion_local); ?>" required> 
            <i class='fa-solid fa-home'></i>
        </div>
        <div class="input-box">
            <input type="text" name="direccion_hogar" placeholder="Dirección (Hogar)" value="<?php echo htmlspecialchars($direccion_hogar); ?>" required>
            <i class='fa-solid fa-home'></i>
        </div>
        <div class="input-box">
            <input type="text" name="telefono" placeholder="Teléfono" value="<?php echo htmlspecialchars($telefono); ?>">
            <i class="fa-solid fa-phone"></i>
        </div>
        <div class="input-box">
            <textarea name="descripcion" placeholder="Descripción"><?php echo htmlspecialchars($descripcion); ?></textarea>
        </div>
        <div class="input-box">
            <input type="file" id="input-imagen" name="imagen" accept="image/*">
            <i class='bx bxs-camera'></i>
        </div>
        <button type="submit">Editar</button>
    </form>
    <script src="https://kit.fontawesome.com/b408879b64.js" crossorigin="anonymous"></script>
</body>
</html>
