<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Modelos/M_productoU.php';

class M_ProductoUTest extends TestCase {
    public function testObtenerProductoUnidad() {
        $productoUnitario = new ProductoUnitario();

        $resultado = $productoUnitario->obtenerProductoUnidad('1');

        $registrosEsperados = 1;
        $cantRegistrosRecibidos = $resultado->num_rows;

        //verifica si la cantidad de registros esperados y la cantidad recibidos, es decir 1, son iguales
        $this->assertEquals($registrosEsperados, $cantRegistrosRecibidos);
    }

    public function testObtenerProductoInvalido() {
        $productoUnitario = new ProductoUnitario();

        $resultado = $productoUnitario->obtenerProductoUnidad('99999');
        
        $registrosEsperados = 0;
        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        //verifica si la cantidad de registros esperados y la cantidad recibidos, es decir 1, son iguales
        $this->assertEquals($registrosEsperados, $numeroDeRegistrosRecibidos);
    }
    
}


?>