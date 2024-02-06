<?php

require_once __DIR__ . '/../Modelos/M_productoCrud.php';
use PHPUnit\Framework\TestCase;

class M_ProductoCrudTest extends TestCase {
    public function testObtenerProductosCrud() {
        // Crear una instancia de la clase ProductosCrud
        $productosCrud = new ProductosCrud();

        $resultado = $productosCrud->obtenerProductosCrud();

        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        // compara y verifica que el numero de registros recibidos sea mayor a 0. 
        $this->assertGreaterThan(0, $numeroDeRegistrosRecibidos, 'La consulta no devolvió registros');
    }

}

?>