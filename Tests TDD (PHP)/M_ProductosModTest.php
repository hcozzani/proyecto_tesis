<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Modelos/M_ProductoMod.php';
require_once __DIR__ . '/../Modelos/M_productoU.php';

class M_ProductosModTest extends TestCase {
    public function testModProducto() {

        $id = '46';
        $nombreNuevo = 'Producto Prueba';
        $precioCostoNuevo = 5000;
        $porcentajeGananciaNuevo = 100;
        $precioVenta = $precioCostoNuevo + (($porcentajeGananciaNuevo/100)*$precioCostoNuevo);
        $categoriaNueva = 'remera';
        $talleNuevo = "L";
        $cantidadNueva = 5;

        // Crear una instancia de la clase ProductosMod
        $productosModCrud = new ProductosModCrud();
        $resultado = $productosModCrud->ModProducto($id, $nombreNuevo, $precioCostoNuevo, $porcentajeGananciaNuevo, $categoriaNueva, $talleNuevo, $cantidadNueva);

        // verifica que el numero de registros afectados sea mayor a 0. 
        $this->assertGreaterThan(0, $resultado);


        //Se busca el producto que se modifico por id y comparamos que los valores recibidos sean iguales a los que le mandamos a ModProducto.
        $buscarProducto = new ProductoUnitario();
        $resultado = $buscarProducto->obtenerProductoUnidad('46');
        $registro = $resultado->fetch_assoc();

        $this->assertEquals($nombreNuevo, $registro['nombre'], 'El nombre no se actualizó correctamente');
        $this->assertEquals($precioVenta, $registro['precioVenta'], 'El porcentaje de ganancia no se actualizó correctamente');
        $this->assertEquals($talleNuevo, $registro['talleCodigo'], 'El talle no se actualizó correctamente');
        $this->assertEquals($cantidadNueva, $registro['cantidad'], 'La cantidad no se actualizó correctamente');

    }


}
