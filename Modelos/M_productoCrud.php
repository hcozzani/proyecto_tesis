<?php

    class ProductosCrud{
        private $conn;

        public function obtenerProductosCrud(){
            require ("conexion.php");
            $query = "SELECT p.id, p.nombre, pr.precioVenta, c.categoriaNombre from productos p JOIN precio pr on pr.idProducto = p.id 
            JOIN categorias c on p.categoriaId = c.id  where p.usuarioBaja is NULL;
            ";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado;
    }
        public function altaProducto($nombre, $precio, $porcentajeGanancia, $categoria, $talle, $cantidad, $img){
            require("conexion.php");
            $query = "call altaProducto(?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssss", $nombre, $precio, $porcentajeGanancia, $categoria, $talle, $cantidad, $img);
            $stmt->execute();
        }

    }
    
?>