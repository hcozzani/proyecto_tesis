<?php

    class ConexionBd{
        private $conn;

        public function obtenerProductos(){
            require ("conexion.php");
            $query = "select p.id, p.nombre,p.categoriaId,p.img, pr.precioVenta, p.usuarioBaja from productos p 
            join precio pr on p.id = pr.idProducto 
            where p.usuarioBaja is NULL;
            ";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado;
    }
        public function carrito(){
            require("conexion.php");
        }

}
    
?>