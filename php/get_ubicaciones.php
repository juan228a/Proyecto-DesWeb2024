<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Consulta para obtener las ubicaciones
$sql = "SELECT ID, propietario, nombreherramienta, descripcionherramienta, latitudherramienta, longitudherramienta, direccionherramienta FROM herramientas";
$resultado = $conexion->query($sql);

// Array para almacenar las ubicaciones
$ubicaciones = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $ubicaciones[] = $fila;
    }
}

// Convertir a JSON y enviar la respuesta
header('Content-Type: application/json');
echo json_encode($ubicaciones);

?>
