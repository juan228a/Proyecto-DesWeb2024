<?php
// Iniciar la sesión
session_start();

// Verificar si los datos de la primera parte están en la sesión
if (!isset($_SESSION['signup_data'])) {
    header('Location: ../html/signup.html'); // Redirigir a la primera parte del registro si no hay datos
    exit();
}

// Obtener los datos de la sesión
$signup_data = $_SESSION['signup_data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro 2/2</title>
    <link rel="stylesheet" href="../css/signUp2.css">
</head>
<body>
   <div class="wrapper">
        <form action="complete_signup.php" method="post" enctype="multipart/form-data">
            <h1>Registro 2/2</h1>
            <div class="input-box">
                <div class="input-feild">
                    <input type="text" name="descripcion" placeholder="Descripcion" required> <i class='bx bxs-user'></i>
                </div>
                <div class="input-feild">
                    <input type="text" name="red1" placeholder="Facebook" required> <i class='bx bxs-phone'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-feild">
                    <input type="text" name="red2" placeholder="Twitter" required> <i class='bx bxs-phone'></i>
                </div>
                <div class="input-feild">
                    <input type="text" name="red3" placeholder="Instagram" required> <i class='bx bxs-phone'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-feild">
                    <input type="text" name="direccion_local" placeholder="Direccion(Local)" required> <i class='bx bxs-home'></i>
                </div>
                <div class="input-feild">
                    <input type="text" name="direccion_hogar" placeholder="Direccion(Hogar)" required> <i class='bx bxs-home'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-feild">
                    <input type="file" id="input-imagen" name="imagen" accept="image/*" required> <i class='bx bxs-camera'></i>
                </div>
            </div>
            <div id="preview"></div>
            <label>
                <input type="checkbox" required>
                Declaro que la información anterior proporcionada es verdadera y correcta.
            </label>
            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
</body>
</html>


</body>
</html>
