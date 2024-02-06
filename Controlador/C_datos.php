<?php
    require ("Modelos/M_productos.php");
    $conexion = new ConexionBd();
    $datosProductos = $conexion->obtenerProductos();
    require("Vistas/V_principal.php");
?>