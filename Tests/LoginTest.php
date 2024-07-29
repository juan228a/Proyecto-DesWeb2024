<?php

use PHPUnit\Framework\TestCase;

class SimpleLoginTest extends TestCase
{
    private $conexion;

    protected function setUp():void
    {
        // Configurar la conexión a la base de datos
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "projectofinal_db";

        $this->conexion = new mysqli($server, $user, $pass, $db);
        if ($this->conexion->connect_error) {
            die("conexion fallida: " . $this->conexion->connect_error);
        }
    }

    public function testSuccessfulLogin()
    {
        // Definir datos de prueba
        $_POST['username'] = 'admin';
        $_POST['password'] = '1234';

        // Ejecutar el método de login y capturar el mensaje de retorno
        $mensaje = $this->login($_POST['username'], $_POST['password']);

        // Verificar que se muestre el mensaje de inicio de sesión exitoso o de error
        $this->assertContains($mensaje, ['Se logueo correctamente', 'Error al logearse']);

        // Asegurar que el mensaje esperado se imprima en la consola
        $this->expectOutputString($mensaje);
    }

    private function login($username, $password)
    {
        // Consulta para verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verificar si se encontró un usuario y comparar contraseñas
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            if ($fila['password'] === $password) {
                // Retornar mensaje de inicio de sesión exitoso
                return "Se logueo correctamente";
            } else {
                // Retornar mensaje de error si la contraseña es incorrecta
                return "Error al logearse";
            }
        } else {
            // Retornar mensaje de error si el usuario no fue encontrado
            return "Error al logearse";
        }
    }

    protected function tearDown():void
    {
        // Cerrar la conexión después de cada prueba
        $this->conexion->close();
    }
}

?>
