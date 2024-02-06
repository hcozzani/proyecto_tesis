<?php

   
require("../Modelos/M_productoMod.php");
$Act = new ProductosModCrud();

$img = "img/";  // Puedes ajustar la ruta según tu estructura de carpetas

// Obtener información del archivo subido
$nombreArchivo = $_FILES['imagen']['name'];
$rutaTemporal = $_FILES['imagen']['tmp_name'];

// Mover el archivo a la ubicación deseada
$rutaFinal = $img . $nombreArchivo;
move_uploaded_file($rutaTemporal, $rutaFinal);

$Act->ModProducto($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['ganancia'], $_POST['categoria'], $_POST['talle'], $_POST['cantidad'], $rutaFinal);
header("Location: ../index.php");

?>