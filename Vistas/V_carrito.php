<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amor & Moda </title>
    <link rel="stylesheet" href="../Estilos/style.css">
    <!-- sdk mercado pago -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <!-- Después cambiar en document el nombre del producto -->
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">
<?php
session_start();
require("navbar.php");

// Verifica si hay productos en el carrito
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    echo '<div class="container mt-5">';
    echo '<h2 class="mb-4">Carrito de Compras</h2>';
    
    $total = 0; // Inicializa la variable para el total
    
    foreach ($_SESSION['carrito'] as $key => $producto) {
        echo '<div class="row border rounded p-3 mb-3 d-flex justify-content-between">';
        echo '<div class="col-md-2">';
        echo '<img src="../img/'.$producto['nombre'].'.webp" alt="' . $producto['nombre'] . '" class="img-fluid">';
        echo '</div>';
        echo '<div class="col-md-2">';
        echo '<h5>' . $producto['nombre'] . '</h5>';
        echo '<p>Talla: ' . $producto['talla'] . '</p>';
        echo '<p>Precio $: ' . $producto['precio'] . ' x ' . $producto['cantidad'] . '</p>'; // Precio por cantidad
        echo '</div>';
        echo '<div class="col-md-2">';
        echo '<label for="cantidad">Cantidad:</label>';
        echo '<input type="number" readonly name="cantidad_comprar[]" value="' . $producto['cantidad'] . '" >';
        echo '</div>';
        echo '<div class="col-md-2">';
        echo '<form method="post" action="../Controlador/C_eliminarProductoCarrito.php">';
        echo '<input type="hidden" name="producto_key" value="' . $key . '">';
        echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;

        //agarro el total para mandarlo a C_facturacion...
        $_SESSION['total'] = $total;
    }

    // Muestra la suma total de todos los productos
    echo '<div class="text-center">';
    echo '<p>Total $: ' . $total . '</p>';
    echo '<form method="post" action="../Controlador/C_realizarCompra.php">';
    foreach ($_SESSION['carrito'] as $producto) {
        echo '<input type="hidden" name="idU" value="' . $producto['idU'] . '">';
        echo '<input type="hidden" name="cantidad" value="' . $producto['cantidad'] . '">';
    }
    echo '<input type="hidden" name="total" value="' . $total . '">';
    echo '<button type="submit" name="comprar" class="btn btn-primary">Comprar</button>';
    echo '</form>';
    echo '<div>';
    echo '<a id="wallet_container"></a>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="container mt-5">';
    echo '<p>No hay productos en el carrito.</p>';
    echo '</div>';
}

// Puedes agregar un botón de compra o continuar comprando aquí


//footer
require("footer.php");
?>

<?php
    require("../Controlador/C_mercadoPago.php");
?>

<script>
    const mp = new MercadoPago('TEST-ac97768c-0f18-44e5-9163-e528aa447305');
    const bricksBuilder = mp.bricks();

    mp.bricks().create("wallet", "wallet_container", {
    initialization: {
       preferenceId: "<?php echo $preference->id;?>",
   },
});


</script>
</body>
</html>
