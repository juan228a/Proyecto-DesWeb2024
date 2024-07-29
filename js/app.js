// Configura tu token de acceso
mapboxgl.accessToken = 'pk.eyJ1IjoidG9tZmd0IiwiYSI6ImNsd3M3ZmR4ajA4ZXQyam9qOGt6OWc5eWEifQ.2Qj_FJon7zZRbeDIDOOBNA';

// Inicializa el mapa
var map = new mapboxgl.Map({
    container: 'map', // ID del contenedor
    style: 'mapbox://styles/mapbox/outdoors-v11', // Estilo del mapa
    center: [-74.5, 40], // Coordenadas iniciales [lng, lat]
    zoom: 9 // Nivel de zoom inicial
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
    fetch('php/get_ubicaciones.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(function (ubicacion) {
                // Crear un marcador en la ubicación
                new mapboxgl.Marker({ color: 'blue' })
                    .setLngLat([ubicacion.longitudherramienta, ubicacion.latitudherramienta])
                    .setPopup(new mapboxgl.Popup().setHTML('<h3>' + ubicacion.nombreherramienta + '</h3><p>' + ubicacion.descripcionherramienta + '</p>'))
                    .addTo(map);
            });
        })
        .catch(error => console.error('Error cargando ubicaciones:', error));
}

// Cargar las ubicaciones cuando el mapa esté listo
map.on('load', function () {
    cargarUbicaciones();
});
