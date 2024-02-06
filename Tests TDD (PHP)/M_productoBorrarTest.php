<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Modelos/M_productoBorrar.php';
require_once __DIR__ . '/../Modelos/M_productoU.php';

class M_productoBorrarTest extends TestCase {
    public function testEliminarProductoExistente() {
        // Crear una instancia de la clase ProductoBorrar
        $productoBorrar = new ProductoBorrar();

        // Llamar a la función con un ID existente
        $id = '49';
        $resultado = $productoBorrar->eliminarProducto($id);

        // verifica que el numero de registros afectados sea mayor a 0. 
        $this->assertGreaterThan(0, $resultado, 'Error testEliminarProductoExistente: La consulta no devolvió registros');

        //vamos a verificar que el registro se dio de baja y no este disponible
        $productoUnitario = new ProductoUnitario();

        $resultado = $productoUnitario->obtenerProductoUnidad('49');

        $registro = $resultado->fetch_assoc();

        $estado = $registro["fechaBaja"];

        echo ("fecha de baja: " . $estado);

    }

    public function testEliminarProductoInexistente() {
        // Crear una instancia de la clase ProductoBorrar
        $productoBorrar = new ProductoBorrar();

        // Llamar a la función con un ID inexistente
        $idInexistente = 99999; 
        $resultado = $productoBorrar->eliminarProducto($idInexistente);

        // Verificar que la operación no afectó ninguna fila
        $this->assertEquals(0, $resultado, 'Error testEliminarProductoInexistente: La consulta afecto a algun registro');
    }

}
?>
