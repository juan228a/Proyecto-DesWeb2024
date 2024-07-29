<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "Log In";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/about.css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css" rel="stylesheet" />
    <style>
        #map {
            height: 500px;
            width: 80%;
            border: 2px solid #809671;
            border-radius: 10px;
        }
    </style>
    <title>Prest-AR | Ubicaciones</title>
</head>
<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="customer-support"></div>
                <div class="container-logo">
                    <h1 class="logo"><a href="index.php">Prest-AR</a></h1>
                </div>
                <div class="container-user">
                    <i class="fa-solid fa-user"></i>
                    <span class="logIn"><a href="perfiluser.php"><?php echo $username; ?></a></span>
                    <span class="signUp"><a href="cerrarsesion.php">Cerrar sesión</a></span>
                </div>
            </div>
        </div>
        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
                <ul class="menu">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="PoliticaDeSeg.php">Política de Seguridad</a></li>
                    <li><a href="aboutUs.php">Acerca de Nosotros</a></li>
                    <li><a href="contacto.php">Contáctame</a></li>
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
            <h1>Ubicaciones</h1>
        </div>
        <div class="container">
            <section class="about">
                <div id="map"></div>
            </section>
        </div>
        <footer class="foot"><b>COPYRIGHT 2024</b></footer>
    </section>

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js"></script>
    <script>
       // Configura tu token de acceso
        mapboxgl.accessToken = 'pk.eyJ1IjoidG9tZmd0IiwiYSI6ImNsd3M3ZmR4ajA4ZXQyam9qOGt6OWc5eWEifQ.2Qj_FJon7zZRbeDIDOOBNA';

        // Inicializa el mapa
        var map = new mapboxgl.Map({
            container: 'map', // ID del contenedor
            style: 'mapbox://styles/mapbox/outdoors-v11', // Estilo del mapa
            center: [-65.2080945, -26.8388312], // Coordenadas iniciales [lng, lat]
            zoom: 14 // Nivel de zoom inicial
        });

        var nav = new mapboxgl.NavigationControl();
        map.addControl(nav, 'top-left'); // Botones de Navegación

        // Permitir al usuario Geolocalización
        var geolocate = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true,
            showUserHeading: true
        });
        map.addControl(geolocate, 'top-left');

        // Función para cargar ubicaciones desde el archivo PHP
        function cargarUbicaciones() {
            fetch('get_ubicaciones.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(function (ubicacion) {
                        // Crear un marcador en la ubicación
                        var marker = new mapboxgl.Marker({ color: 'blue' })
                            .setLngLat([ubicacion.longitudherramienta, ubicacion.latitudherramienta])
                            .addTo(map);
                        // Crear un popup y agregarlo al mapa directamente
                        new mapboxgl.Popup({ closeOnClick: true })
                            .setLngLat([ubicacion.longitudherramienta, ubicacion.latitudherramienta])
                            .setHTML('<h2><p>' + ubicacion.propietario + '<h3>' + ubicacion.nombreherramienta + '</h3><p>' + ubicacion.descripcionherramienta + '</p>')
                            .addTo(map);
                    });
                })
                .catch(error => console.error('Error cargando ubicaciones:', error));
        }

        // Cargar las ubicaciones cuando el mapa esté listo
        map.on('load', function () {
            cargarUbicaciones();
        });
    </script>
   
</body>
</html>
