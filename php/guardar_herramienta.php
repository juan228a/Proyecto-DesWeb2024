<?php
// Incluir archivo de conexión
include 'conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $propietario = $_POST['propietario'];
    $nombre_herramienta = $_POST['nombreherramienta'];
    $descripcion_herramienta = $_POST['descripcionherramienta'];
    $direccion_herramienta = $_POST['direccionherramienta'];
    $latitud = $_POST['latitudherramienta'];
    $longitud = $_POST['longitudherramienta'];

         // Procesar la imagen
         $imagen = $_FILES['imagen']['name'];
         $target_dir = "../img-herramientas/";
         $target_file = $target_dir . basename($imagen);
         move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO herramientas (propietario, nombreherramienta, descripcionherramienta, direccionherramienta, latitudherramienta, longitudherramienta, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssdds", $propietario, $nombre_herramienta, $descripcion_herramienta, $direccion_herramienta, $latitud, $longitud, $target_file);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al guardar la herramienta: " . $stmt->error;
    }

    $stmt->close();
}
$conexion->close();
?>
