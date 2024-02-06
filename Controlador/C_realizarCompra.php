<?php
require("../Modelos/M_realizarCompra.php");
require("../Modelos/conexion.php");

session_start();

// Crear una instancia del modelo
$compraModel = new CompraModel($conn);

if (isset($_POST['comprar'])) {
    // Recorre los productos en el carrito
    foreach ($_SESSION['carrito'] as $producto) {
        $productoTalleId = $producto['idU'];
        $cantidadVender = $producto['cantidad'];

        // Llama al método del modelo para comprar el producto
        if ($compraModel->comprarProducto($productoTalleId, $cantidadVender)) {
            // La compra fue exitosa, puedes hacer algo aquí si es necesario
        } else {
            echo "Error al ejecutar el procedimiento almacenado: " . mysqli_error($conn);
        }
    }

    // Limpia el carrito después de la compra
    unset($_SESSION['carrito']);

    // Cierra la conexión a la base de datos
    $conn->close();
  }
?>


