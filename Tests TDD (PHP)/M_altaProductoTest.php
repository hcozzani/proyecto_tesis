<?php

require_once __DIR__ . '/../Modelos/M_productoCrud.php';
require_once __DIR__ . '/../Modelos/M_filtrado.php';
use PHPUnit\Framework\TestCase;

class M_altaProductoTest extends TestCase {

    public function testAltaProductoExitosa() {
        $nombre = "ProductoDePruebaTDD";
        $precio = "9.99";
        $porcentajeGanancia = "40";
        $categoria = "remera";
        $talle = "M";
        $cantidad = "100";
    
        $crud = new ProductosCrud();
        $resultado = $crud->altaProducto($nombre, $precio, $porcentajeGanancia, $categoria, $talle, $cantidad);
    
        // verifica que el numero de registros afectados sea mayor a 0. 
        $this->assertGreaterThan(0, $resultado);



        

        //Consultamos con la funcion de filtrar productos para comprobar que el producto agregado esta en la base.
        $filtrado = new FiltradoProductos();
        $resultado = $filtrado->obtenerProductosFiltrado('ProductoDePrueba');

        $numeroDeRegistrosRecibidos = $resultado->num_rows;

        // compara que el numero de registros recibidos sea mayor a 0. 
        $this->assertGreaterThan(0, $numeroDeRegistrosRecibidos, 'La consulta no devolvió registros');
    }
    


}

?>