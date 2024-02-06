<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Modelos/M_filtrado.php';

class M_filtrado_FiltrarProductoTest extends TestCase {
    public function testObtenerProductoInvalido() {
        // Crear una instancia de la clase FiltradoProductos
        $filtrado = new FiltradoProductos();

        // Llamar a la función con un nombre de producto inexistente
        $resultado = $filtrado->obtenerProductosFiltrado('productoInexistente');

        $registrosEsperados = 0;
        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        //compara que los valores sean iguales, en este caso 0
        $this->assertEquals($registrosEsperados, $numeroDeRegistrosRecibidos, 'La consulta devolvio mas de 0 filas' );
        
    }

    

    public function testObtenerProductoValido() {
        $filtrado = new FiltradoProductos();

        // Llama a la función con un nombre de producto Existente o si no se le escribe nada tambien deberia devolver todos los registros
        $resultado = $filtrado->obtenerProductosFiltrado('euphoria');

        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        // compara que el numero de registros recibidos sea mayor a 0 en este caso. 
        $this->assertGreaterThan(0, $numeroDeRegistrosRecibidos, 'La consulta no devolvió registros');
    }



    public function testInyeccionSQL() {

        $filtrado = new FiltradoProductos();

        $nombre = 'ProductoIny';

        // se prueba intentar inyeccion SQL con tratar de insertar un nuevo producto
        $inyeccionSQL = "'a%' ; INSERT INTO productos (nombre) VALUES ($nombre);-- " ;
        $resultado = $filtrado->obtenerProductosFiltrado($inyeccionSQL);

        // Llama a la función con el nombre que tratamos de insertar
        $resultado = $filtrado->obtenerProductosFiltrado($nombre);

        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        // si el codigo funciona bien no deberia devolver ningun registro, comparamos $registros esperados con la cant de registrosRecibidos.
        $registrosEsperados = 0;
        $numeroDeRegistrosRecibidos = $resultado->num_rows;
        $this->assertEquals($registrosEsperados, $numeroDeRegistrosRecibidos, 'La consulta devolvio mas de 0 filas' );
    }
    
    


}
?>