<?php
// Iniciar la sesión
session_start();

// Incluir archivo de conexión
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Obtener la URL de la imagen desde la base de datos
    $sql = "SELECT nombre, email, telefono, provincia, ciudad, descripcion, red1, red2, red3, direccion_local, direccion_hogar, imagen FROM usuarios WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($nombre, $email, $telefono, $provincia, $ciudad, $descripcion, $red1, $red2, $red3, $direccion_local, $direccion_hogar, $imagen);
        $stmt->fetch();
        $stmt->close();

        // Almacenar los datos del usuario en la sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['provincia'] = $provincia;
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['imagen'] = $imagen;
        $_SESSION['descripcion'] = $descripcion;
        $_SESSION['red1'] = $red1;
        $_SESSION['red2'] = $red2;
        $_SESSION['red3'] = $red3;
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
        exit;
    }
} else {
    // Redirigir a la página de inicio de sesión si no hay sesión iniciada
    header('Location: login.html');
    exit;
}
?>

<!-- <!DOCTYPE html>
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
        <link rel="stylesheet" href="../css/perfiluser.css" />
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
<section class="banner">
    <div class="content-banner">
        <div class="circle-container">
            <<img src="<?php echo htmlspecialchars($_SESSION['imagen']); ?>" alt="Foto de perfil" class="profile-picture">
        </div>
    </div>
</section>
<br><br><br><br><br><br>
<div class="DatosUser">
    <br>
    <h1 class="datoss"><b><?php echo htmlspecialchars($nombre); ?></b></h1>
    <hr><br>
    <p class="datosss"><h2>Email: <?php echo htmlspecialchars($email); ?></h2></p><br>
    <p class="datosss"><h2>Teléfono: <?php echo htmlspecialchars($telefono); ?></h2></p><br>
    <p class="datosss"><h2>Provincia: <?php echo htmlspecialchars($provincia); ?></h2></p><br>
    <p class="datosss"><h2>Ciudad: <?php echo htmlspecialchars($ciudad); ?></h2></p><br>
    <p class="redespersona"><h2>*Redes*</h2></p>
    <section>
        <div class="logo-container">
            <img src="../imagenes/instagram.jpeg" class="insta" alt="Logo">
            <h3><?php echo htmlspecialchars($red1); ?></h3>
        </div>
        <br>
        <div class="logo-container">
            <img src="../imagenes/facebook.jpeg" class="face" alt="Logo">
            <h3><?php echo htmlspecialchars($red2); ?></h3>
        </div>
        <br>
        <div class="logo-container">
            <img src="../imagenes/tw.jpeg" class="twitter" alt="Logo">
            <h3><?php echo htmlspecialchars($red3); ?></h3>
        </div>
    </section>
    <br>
    <hr>
</div>
</main>
</body>
</html> -->






 <!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        />
        <title>Prest-AR</title>
        <link rel="stylesheet" href= />
        <link rel="stylesheet" href="../css/perfiluser.css" />
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
            <section class="banner">
                <div class="content-banner">
                    <div class="circle-container">
                        <img src="<?php echo htmlspecialchars($_SESSION['imagen']); ?>" alt="Foto de perfil" class="profile-picture">
                    </div>
                </div>
            </section>
            <div class="DatosUser">
                <h1 class="datoss"><b><?php echo htmlspecialchars($nombre); ?></b></h1>
                <hr>
                <p class="datosss"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p class="datosss"><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>
                <p class="datosss"><strong>Provincia:</strong> <?php echo htmlspecialchars($provincia); ?></p>
                <p class="datosss"><strong>Ciudad:</strong> <?php echo htmlspecialchars($ciudad); ?></p>
                <h2 class="redespersona">*Redes*</h2>
                <section>
                    <div class="logo-container">
                        <img src="../imagenes/instagram.jpeg" class="insta" alt="Logo">
                        <h3><?php echo htmlspecialchars($red1); ?></h3>
                    </div>
                    <div class="logo-container">
                        <img src="../imagenes/facebook.jpeg" class="face" alt="Logo">
                        <h3><?php echo htmlspecialchars($red2); ?></h3>
                    </div>
                    <div class="logo-container">
                        <img src="../imagenes/tw.jpeg" class="twitter" alt="Logo">
                        <h3><?php echo htmlspecialchars($red3); ?></h3>
                    </div>
                </section>
                <hr>
            </div>
        </main>



</body>
</html>  -->




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
        <link rel="stylesheet" href="../css/perfiluser.css" />

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

                </nav>
            </div>
        </header>

        <main> 
            <section class="banner">
                <div class="content-banner">
                    <div class="circle-container">
                        <img src="<?php echo htmlspecialchars($_SESSION['imagen']); ?>" alt="Foto de perfil" class="profile-picture">
                    </div>
                </div>
            </section>
            <div class="DatosUser">
                <h1 class="datoss"><b><?php echo htmlspecialchars($nombre); ?></b></h1>
                <hr>
                <p class="datosss"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p class="datosss"><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>
                <p class="datosss"><strong>Provincia:</strong> <?php echo htmlspecialchars($provincia); ?></p>
                <p class="datosss"><strong>Ciudad:</strong> <?php echo htmlspecialchars($ciudad); ?></p>
               
                <section class="redesSocial">
                    <div class="logo-container">
                        <img src="../imagenes/instagram.jpeg" class="insta" alt="Logo">
                        <h3><?php echo htmlspecialchars($red1); ?></h3>
                    </div>
                    <div class="logo-container">
                        <img src="../imagenes/facebook.jpeg" class="face" alt="Logo">
                        <h3><?php echo htmlspecialchars($red2); ?></h3>
                    </div>
                    <div class="logo-container">
                        <img src="../imagenes/tw.jpeg" class="twitter" alt="Logo">
                        <h3><?php echo htmlspecialchars($red3); ?></h3>
                    </div>
                </section>

                
                <hr>
            </div>

            <section class="botones">
                <article class="botones__items">
                    <a href="editoruser.php" class="boton">Editar</a>
                    <a href="sumarherramienta.php" class="boton">Añadir Herramientas</a>
                </article>
            </section>
        </main>
   
        <footer class="foot"><b>COPYRIGHT 2024</b></footer>
    
</body>
</html> 



