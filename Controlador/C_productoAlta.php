<?php
session_start();
require("../Modelos/M_productoCrud.php");

$conexion = new ProductosCrud();

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$ganancia = $_POST['ganancia'];
$categoria = $_POST['categoria'];
$talle = $_POST['talle'];
$cantidad = $_POST['cantidad'];

// Ruta donde deseas almacenar las imágenes
$img = "img/";  // Puedes ajustar la ruta según tu estructura de carpetas

// Obtener información del archivo subido
$nombreArchivo = $_FILES['imagen']['name'];
$rutaTemporal = $_FILES['imagen']['tmp_name'];

// Mover el archivo a la ubicación deseada
$rutaFinal = $img . $nombreArchivo;
move_uploaded_file($rutaTemporal, $rutaFinal);

$datos = $conexion->altaProducto($nombre, $precio, $ganancia, $categoria, $talle, $cantidad, $rutaFinal);

if ($datos === false) {
    // Manejo de errores
    echo "Error al ejecutar el procedimiento almacenado: ";
} else {
    header("Location: ../index.php");
}
// header("Location: ../index.php");
?>
