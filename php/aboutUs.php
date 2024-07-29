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
         <link rel="stylesheet" href="../css/about.css" />
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

<section>
    <div class="heading">
        <h1>About Us</h1>
    </div>

    <div class="conteiner">
         <section class="about">
            <div class="about-image">
                <img src="../imagenes/equipo.jpg" alt="">
            </div>
            <div class="about-content">
                <h2>Prest-AR</h2>
                <p>En Prest-AR, nos dedicamos a proporcionarte una plataforma conveniente y confiable para alquilar las herramientas que necesitas para tus proyectos. Nuestro objetivo es hacer que el proceso de alquiler de herramientas sea lo más sencillo y fácil posible, para que puedas concentrarte en hacer realidad tus ideas y proyectos.</p>

            </div>
        </div>
</section>

<br><br><br><br><br><br>
<br>
<br>

<footer class="foot"><b>COPYRIGHT 2024</b></footer>


</body>
<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
</html>