<?php
session_start();
if (isset($_POST['agregarCarrito'])) {
    // Obtén los datos del producto del formulario
    $idU = $_POST['idU']; // Agrega esta línea para obtener el ID
    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $talla = $_POST['talla'];
    $cantidad = $_POST['cantidad'];

    if ($cantidad <= 0 ){
        header("Location: ../Vistas/V_error.php");
    }else{

    // Crea un array para representar el producto
    $producto = array(
        'idU' => $idU, // Agrega el ID al array del producto
        'imagen' => $imagen,
        'nombre' => $nombre,
        'precio' => $precio,
        'talla' => $talla,
        'cantidad' => $cantidad
    );

    // Verifica si el producto ya existe en el carrito
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['nombre'] === $nombre && $item['talla'] === $talla) {
                // Si el producto ya existe, simplemente incrementa la cantidad
                $item['cantidad'] += $cantidad;
                // Redirige al usuario a la página del carrito
                header("Location: ../Vistas/V_carrito.php");
                exit(); // Asegúrate de que el script se detenga después de la redirección
            }
        }
    }

    // Si el producto no existe en el carrito, agrégalo
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    $_SESSION['carrito'][] = $producto;

    // Redirige al usuario a la página del carrito
    header("Location: ../Vistas/V_carrito.php");
    exit(); // Asegúrate de que el script se detenga después de la redirección
}
}

// Resto del código del controlador...

?>
