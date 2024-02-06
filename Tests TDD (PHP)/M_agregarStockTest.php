<?php

require_once __DIR__ . '/../Modelos/M_agregarStock.php';

use PHPUnit\Framework\TestCase;

class M_agregarStockTest extends TestCase {
    public function testAgregarStock() {
        $stock = new Stock();
        $id = 1;
        $talle = "L";
        $cantidad = 3;

        $resultado = $stock->agregarStock($id, $talle, $cantidad);

        // verifica que el numero de registros afectados sea mayor a 0. 
        $this->assertGreaterThan(0, $resultado);
    }

    public function testAgregarStockIDInexistente() {
        $stock = new Stock();
        $id = 999; // ID de producto inexistente
        $talle = "S";
        $cantidad = 25;

        //Va a dar error..
        $resultado = $stock->agregarStock($id, $talle, $cantidad);

        echo "cantidad lineas afectadas : " . $resultado;
    
        $this->assertEquals(0, $resultado);
    }
}