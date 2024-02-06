<?php
session_start();

if (isset($_POST['producto_key'])) {
    $producto_key = $_POST['producto_key'];

    // Verifica si existe un carrito de compras en la sesión
    if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) {
        // Verifica si la clave del producto existe en el carrito
        if (array_key_exists($producto_key, $_SESSION['carrito'])) {
            // Elimina el producto del carrito usando la clave
            unset($_SESSION['carrito'][$producto_key]);
        }
    }
}

// Redirige de vuelta a la página del carrito después de eliminar el producto
header("Location: ../Vistas/V_carrito.php");
exit(); // Asegúrate de que el script se detenga después de la redirección
?>
