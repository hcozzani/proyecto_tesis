<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <link rel="stylesheet" href="../Estilos/style.css">

</head>
<body>
<?php require("../Vistas/navbar.php");
$idProducto = $_GET["id"];

?>

<div class="container mt-4">
        <h1>Formulario de Producto</h1>
        <form action="../Controlador/C_productoMod.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idProducto;?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio">
            </div>
                <div class="form-group">
        <label for="cantidad">Porcentaje ganancia:</label>
        <input type="number" class="form-control" id="ganancia" name="ganancia">
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="remera">remera</option>
                    <option value="buzo">buzo</option>
                    <option value="camisa">camisa</option>
                    <option value="pantalon">pantalon</option>
                    <option value="vestido">vestido</option>
                </select>
            </div>

        <div class="form-group">
            <label for="talle">Talle:</label>
            <select class="form-control" id="talle" name="talle">
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>

                <!-- Agrega más opciones según tus necesidades -->
            </select>
        </div>

    <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad">
    </div>

    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
    </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</body>
</html>
