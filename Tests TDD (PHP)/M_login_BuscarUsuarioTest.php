<?php
require_once __DIR__ . '/../Modelos/M_login.php';


use PHPUnit\Framework\TestCase;

class M_login_BuscarUsuarioTest extends TestCase {
    public function testBuscarUsuarioEmailValido() {
        // Crear una instancia de la clase Login
        $login = new Login();

        // email para comprobar la prueba
        $email = 'eliasalegre96@gmail.com';

        // Llama a la función que deseas probar
        $resultado = $login->buscarUsuario($email);

        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        // compara que el numero de registros recibidos sea mayor a 0
        $this->assertGreaterThan(0, $numeroDeRegistrosRecibidos, 'La consulta no devolvio ningun registro con ese email');
    }


    public function testBuscarUsuarioEmailInexistente() {
        // Crear una instancia de la clase Login
        $login = new Login();

        // Llamar a la función con un email inexistente
        $emailInexistente = 'mailInvalido@prueba.com';
        $resultado = $login->buscarUsuario($emailInexistente);

        $registrosEsperados = 0;
        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        //compara que los valores sean iguales, en este caso 0
        $this->assertEquals($registrosEsperados, $numeroDeRegistrosRecibidos, 'La consulta devolvio mas de 0 filas' );
    }


    public function testInyeccionSQL() {
        // Crear una instancia de la clase FiltradoProductos
        $login = new Login();

        $emailFalso = 'mailInyeccion@prueba.com';

        // se prueba intentar inyeccion SQL con tratar de insertar un nuevo producto
        $inyeccionSQL = "'eliasalegre96@gmail.com' ; INSERT INTO usuarios (nombre, apellido, email, valorSalt, hashContrasena, rol) VALUES ('prueba', 'prueba', 'mailInyeccion@prueba.com', '1234', '1234', 'prueba'); " ;
        $resultado = $login->buscarUsuario($inyeccionSQL);

        // Llama a la función con el nombre que tratamos de insertar
        $resultado = $login->buscarUsuario($emailFalso);


        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        // si el codigo funciona bien no deberia devolver ningun registro, comparamos $registrosEsperados con la cant de registrosRecibidos.
        $registrosEsperados = 0;
        $numeroDeRegistrosRecibidos = $resultado->num_rows;
        $this->assertEquals($registrosEsperados, $numeroDeRegistrosRecibidos, 'La consulta devolvio mas de 0 filas' );
    }


}

?>