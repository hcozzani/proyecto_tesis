<?php

    require ("../Modelos/M_agregarStock.php");
    $stock = new Stock();
    $stock->agregarStock($_POST['id'],$_POST['talle'],$_POST['cantidad']);
    header("Location: ../index.php");
    // require("../Vistas/V_formAgregarStock.php");
    
// }
    
    

?>