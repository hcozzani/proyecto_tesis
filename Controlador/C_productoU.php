<?php

    require ("../Modelos/M_productoU.php");
    $id = $_POST['id'];
    $conexion = new ProductoUnitario();
    $datosProductosU = $conexion->obtenerProductoUnidad($id);
    require("../Vistas/V_productoU.php");
    
// }
    
    

?>