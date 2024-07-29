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
		<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<header>
			<div class="container-hero">
				<div class="container hero">
					<div class="customer-support">
						<!-- <i class="fa-solid fa-headset"></i> -->
						<!-- <div class="content-customer-support">
							<span class="text">Soporte al cliente</span>
							<span class="number">123-456-7890</span>
						</div> -->
					</div>

					<div class="container-logo">
						<!-- <i class="fa-solid fa-mug-hot"></i> -->
						<h1 class="logo"><a href="/">Prest-AR</a></h1>
					</div>

					<div class="container-user">
            <i class="fa-solid fa-user"></i>
            <span class="logIn"><a href="perfiluser.php"><?php echo $username; ?></a></span>