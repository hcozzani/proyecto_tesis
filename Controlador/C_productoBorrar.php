<?php
    // session_start();
    // if (isset($_SESSION['nombre']) && $_SESSION['esadmin'] == 1){
    require ("../Modelos/M_productoBorrar.php");
    // require("../Vista/V_VistaHambur.php");
    $eliminar = new ProductoBorrar();
    $eliminar->eliminarProducto($_GET['id']);
    header("Location: ../index.php");
    // }
    ?>

