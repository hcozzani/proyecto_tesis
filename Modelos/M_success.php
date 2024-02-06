<?php

require_once('../vendor/autoload.php');
require_once ("../Vistas/navbar.php");
//$pdf = new TCPDF();

if (isset($_GET['status'])) {
    $status = $_GET['status'];


    if ($status === 'approved') {
        //CODIGO DE PRUEBA...
        echo "<div class='text-center'>";
        echo "<h1>Compra exitosa en Mercado Pago</h1>";
        echo "<p>¡Gracias por tu compra!</p>";
        echo "<a href='../Controlador/C_facturacion.php' class='btn btn-success'>Descargar Factura</a>";
        echo "</div>";
        
        // Obtener datos necesarios de la preferencia (ajusta según tu lógica)
        if (isset ($idU) && isset ($cantidad)){
        $idU = $_POST['idU'];  // Ejemplo, ajusta según tu lógica
        $cantidad = $_POST['cantidad'];  // Ejemplo, ajusta según tu lógica

        // Llamar al procedimiento almacenado compraProducto
        require("../Modelos/conexion.php");
        $stmt = $conn->prepare("CALL compraProducto(?, ?)");
        $stmt->bind_param("ii", $idU, $cantidad);

        if ($stmt->execute()) {
            echo "<div class='text-center'>";
            echo "<p>Procedimiento de compraProducto ejecutado con éxito.</p>";
            echo "</div>";
        } else {
            echo "<div class='text-center'>";
            echo "<p>Error al ejecutar el procedimiento de compraProducto.</p>";
            echo "</div>";
        }

        $stmt->close();
        $conn->close();
    }

    } elseif ($status === 'rejected') {
        echo "<div class='text-center'>";
        echo "<h1>Pago rechazado!</h1>";
        echo "</div>";

    } elseif ($status === 'pending') {
        echo "<div class='text-center'>";
        echo "<h1>Pago pendiente!</h1>";
        echo "</div>";
    }
}
require_once ("../Vistas/footer.php");
?>
