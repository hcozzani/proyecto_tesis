<?php

    require ("../Modelos/M_productoCrud.php");
    $conexion = new ProductosCrud();
    $datosProductosCrud = $conexion->obtenerProductosCrud();
    require("../Vistas/V_productoCrud.php");
    
// }
    
    

?>