<?php

    class ProductosModCrud{
        private $conn;

        public function ModProducto($id, $nombre, $precio, $porcentajeGanancia, $categoria, $talle, $cantidad, $rutaImagen){
            require("conexion.php");
            $query = "call modificarProducto(?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssss", $id, $nombre, $precio, $porcentajeGanancia, $categoria, $talle, $cantidad, $rutaImagen);
            $stmt->execute();
    
        }

}
    
?>