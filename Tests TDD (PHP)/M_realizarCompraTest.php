<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Modelos/M_realizarCompra.php';

class M_realizarCompraTest extends TestCase {
    
    public function testComprarProducto() {
        require_once __DIR__ . '/../Modelos/conexion.php';

        $CompraModel = new CompraModel($conn);
        
        //datos de prueba validos
        $productoTalleId = 44; // El ID debe ser el de la tabla Producto-talle.
        $cantidadVender = 1; // Cantidad a comprar

        $resultado = $CompraModel->comprarProducto($productoTalleId, $cantidadVender);

        echo "\nLineas afectadas ID valido: " . $resultado ."\n";

        // Verifica que las filas afectadas sean mayor a 1
        $this->assertGreaterThan(1, $resultado, 'Error testEliminarProductoExistente: La consulta no devolvió registros');

        //datos de prueba invalidos
        $productoTalleId = 9999; 
        $cantidadVender = 1; 

        $resultado = $CompraModel->comprarProducto($productoTalleId, $cantidadVender);

        echo "Lineas afectadas ID invalido: " . $resultado;

        // verifica que el numero de registros afectados sea mayor a 0. 
        $this->assertEquals(0, $resultado, 'Error testEliminarProductoExistente: La consulta no devolvió registros');
    
    }
}