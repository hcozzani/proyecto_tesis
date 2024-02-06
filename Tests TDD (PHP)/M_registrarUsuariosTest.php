<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Modelos/M_registrarUsuarios.php';
require_once __DIR__ . '/../Modelos/M_login.php';

class M_registrarUsuariosTest extends TestCase {
    public function testRegistrarUsuario() {
        // Crea una instancia de la clase RegistarUsuarios
        $registarUsuarios = new RegistarUsuarios();

        $nombre = 'Test';
        $apellido = 'Test';
        $email = 'test@example.com';
        $telefono = '11111111';
        $saltHex = '11111111';
        $hashContraseña = '111111111';
        $rolElegido = 'Test';

        // Realiza la prueba con datos de ejemplo
        $resultado = $registarUsuarios->registrarUsuario($nombre, $apellido, $email, $telefono, $saltHex, $hashContraseña, $rolElegido);

        // Si la operación registrarUsuario tiene éxito y devuelve true, la prueba pasa.
        $this->assertTrue($resultado);




        //comprobamos que el nuevo usuario se registro buscando su mail

        $login = new Login();

        // Llama a la función que deseas probar
        $resultado = $login->buscarUsuario($email);

        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        echo "Registros encontrados: " . $numeroDeRegistrosRecibidos;

        // compara que el numero de registros recibidos sea mayor a 0
        $this->assertGreaterThan(0, $numeroDeRegistrosRecibidos, 'La consulta no devolvio ningun registro con ese email');
    }

    
}

?>