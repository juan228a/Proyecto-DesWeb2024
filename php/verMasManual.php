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
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        />
        <title>Prest-AR</title>
        <link rel="stylesheet" href="../css/style.css" />
         <link rel="stylesheet" href="../css/verMasMan.css" />
    </head>
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
<main>
        <section class="contenido">
            <div class="mostrador" id="mostrador">
                <!-- Herramientas se agregarán aquí dinámicamente -->
            </div>
        </section>
        <section class="formulario" id="formulario" style="display: none;">
            <form id="rentForm" action="https://formsubmit.co/prestar2024@gmail.com" method="post">
                <h2>Alquilar Herramienta</h2>
                <p id="toolName"></p>
                <input type="hidden" id="toolPrice">
                <label for="rentalDays">Días de alquiler:</label>
                <input type="number" id="rentalDays" required>
                <label for="customerName">Nombre:</label>
                <input type="text" id="customerName" required>
                <label for="customerEmail">Email:</label>
                <input type="email" id="customerEmail" required>
                <button type="submit">Alquilar</button>
                <button type="button" onclick="cancelForm()">Cancelar</button>
            </form>
        </section>
    </main>
    
    <footer class="foot"><b>COPYRIGHT 2024</b></footer>
    
    <script src="../js/carrito.js"></script>


</body>
</html>