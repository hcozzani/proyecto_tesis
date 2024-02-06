<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Modelos/M_productos.php';

class M_productosTest extends TestCase {
    public function testObtenerProductosActivos() {
        $conexionBd = new ConexionBd();
    
        $resultado = $conexionBd->obtenerProductos();

        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        echo "Cantidad de registros recibidos: " . $numeroDeRegistrosRecibidos;

        // verifica que el numero de registros recibidos sea mayor a 0
        $this->assertGreaterThan(0, $numeroDeRegistrosRecibidos, 'La consulta no devolvió registros');
    }
}
?>