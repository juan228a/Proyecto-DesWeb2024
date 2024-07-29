<?php
// Iniciar la sesión
session_start();

// Incluir archivo de conexión
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // Recuperar el nombre del usuario de la base de datos
    $sql = "SELECT nombre FROM usuarios WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($nombre);
    $stmt->fetch();
    $stmt->close();
} else {
    $nombre = "";
    $username = "Log In";
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Herramienta</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/sumarherramienta.css">
</head>
<body>
    <body>
        <header>
            <div class="container-hero">
                <div class="container hero">
                    <div class="customer-support">
                    </div>

                    <div class="container-logo">
                    <h1 class="logo"><a href="index.php">Prest-AR</a></h1>
                    </div>

                    <div class="container-user">
            <i class="fa-solid fa-user"></i>
            <span class="logIn"><a href="perfiluser.php"><?php echo $username;?></a></span>
           <span class="signUp"><a href="cerrarsesion.php">Cerrar sesion</a></span>
        </div>
                </div>
            </div>

            <div class="container-navbar">
                <nav class="navbar container">
                    <i class="fa-solid fa-bars"></i>
                    <ul class="menu">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a  href="PoliticaDeSeg.php">Politica de Seguridad</a></li>
                        <li><a href="aboutUs.php">Acerca de Nosotros</a></li>
                        <li><a href="contacto.php">Contactame</a></li>
                        <li><a href="ubicaciones.php">Ubicaciones</a></li>
                        
                    </ul>

                    <form class="search-form">
                        <input type="search" placeholder="Buscar..." />
                        <button class="btn-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </nav>
            </div>
        </header>
    <section>
        <div class="heading">
            <h1>Ingresar Herramienta</h1>
        </div>
        <div class="container">
            <form action="guardar_herramienta.php" method="POST" enctype="multipart/form-data">
                <label for="propietario">Nombre del Dueño:</label>
                <input type="text" id="propietario" name="propietario" required value="<?php echo $nombre;?>"><br><br>

                <label for="nombreherramienta">Nombre de la Herramienta:</label>
                <input type="text" id="nombreherramienta" name="nombreherramienta" required><br><br>

                <label for="descripcionherramienta">Descripción de la Herramienta:</label>
                <textarea id="descripcionherramienta" name="descripcionherramienta" required></textarea><br><br>

                <label for="direccionherramienta">Dirección:</label>
                <input type="text" id="direccionherramienta" name="direccionherramienta" required>
                <button type="button" onclick="getLocation()">Detectar mi ubicación</button><br><br>

                <label for="latitud">Latitud:</label>
                <input type="text" id="latitudherramienta" name="latitudherramienta" readonly><br><br>

                <label for="longitud">Longitud:</label>
                <input type="text" id="longitudherramienta" name="longitudherramienta" readonly><br><br>

                <div class="input-box">
                <div class="input-feild">
                    <input type="file" id="input-imagen" name="imagen" accept="image/*" required> <i class='bx bxs-camera'></i>
                </div>
            </div>
<br>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </section>

    <footer class="foot"><b>COPYRIGHT 2024</b></footer>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocalización no es soportada por este navegador.");
            }
        }

        function showPosition(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            document.getElementById("latitudherramienta").value = lat;
            document.getElementById("longitudherramienta").value = lon;

            const geocoder = new google.maps.Geocoder();
            const latLng = new google.maps.LatLng(lat, lon);
            geocoder.geocode({ 'location': latLng }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        document.getElementById("direccionherramienta").value = results[0].formatted_address;
                    } else {
                        alert("No se encontraron resultados.");
                    }
                } else {
                    alert("Geocoder falló debido a: " + status);
                }
            });
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("El usuario denegó la solicitud de geolocalización.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("La información de ubicación no está disponible.");
                    break;
                case error.TIMEOUT:
                    alert("La solicitud para obtener la ubicación del usuario expiró.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("Ocurrió un error desconocido.");
                    break;
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_CLAVE_API&callback=initMap" async defer></script>
</body>
</html>
