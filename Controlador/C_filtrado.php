<?php
// Procesa la búsqueda
require_once("../Modelos/M_filtrado.php");
// require_once("../Vistas/navbar.php");

$producto = $_POST['producto'];
$conexion = new FiltradoProductos();
$filtroResultado = $conexion->obtenerProductosFiltrado($producto);
require_once("../Vistas/V_filtrado.php");
exit;

?>