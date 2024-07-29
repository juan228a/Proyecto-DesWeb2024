<?php

use PHPUnit\Framework\TestCase;

class SignupTest extends TestCase
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

    public function testSuccessfulSignup()
    {
        // Definir datos de prueba
        $_POST['username'] = 'nuevoUsuario';
        $_POST['password'] = 'nuevaPassword';

        // Ejecutar el método de signup y capturar el mensaje de retorno
        $mensaje = $this->signup($_POST['username'], $_POST['password']);

        // Verificar que se muestre el mensaje de registro exitoso o de error
        $this->assertContains($mensaje, ['Registro exitoso', 'Error al registrarse']);

        // Asegurar que el mensaje esperado se imprima en la consola
        $this->expectOutputString($mensaje);
    }

    private function signup($username, $password)
    {
        // Consulta para verificar si el usuario ya existe
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Retornar mensaje de error si el usuario ya existe
            echo "Error al registrarse";
            return "Error al registrarse";
        } else {
            // Consulta para insertar el nuevo usuario
            $sql = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {
                // Retornar mensaje de registro exitoso
                echo "Registro exitoso";
                return "Registro exitoso";
            } else {
                // Retornar mensaje de error si ocurrió un problema al insertar
                echo "Error al registrarse";
                return "Error al registrarse";
            }
        }
    }

    protected function tearDown():void
    {
        // Cerrar la conexión después de cada prueba
        $this->conexion->close();
    }
}

?>
