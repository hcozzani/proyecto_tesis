<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ecommerce/estilos/style.css">
    <title>Amor & Moda</title>
    <!-- Despues cambiar en document el nombre del producto -->
</head>
<body>
  <div class="ContenedorPadre">
    <br><br>
<div class="ContenedorProductos">
    <?php
    while ($fila = mysqli_fetch_assoc($datosProductos)){?>
<div class="card" style="width: 12rem;">
  <img src="<?php echo $fila["img"];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fila["nombre"];?>
</h5>
    <p class="card-text">$<?php echo $fila["precioVenta"];?></p>
    <!-- <button type="submit" class="btn btn-primary">Subir</button> -->
    <div class="btnComprar">
      <form action="/ecommerce/Controlador/C_productoU.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
        <button class="btn-comprar">COMPRAR</button>
    </form>
    </div>
  </div>
</div>
<?php } ?>
</div>
<?php require("footer.php"); ?>
</div>
</div>
</body>
</html>