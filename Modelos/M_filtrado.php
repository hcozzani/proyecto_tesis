<?php

class FiltradoProductos {
    private $conn;

    public function obtenerProductosFiltrado($nombre) {
        require("conexion.php");

        // Utiliza una consulta preparada para evitar la inyección de SQL
        $query = "SELECT * FROM productos WHERE nombre LIKE CONCAT('%', ?, '%') AND usuarioBaja is NULL";
        $stmt = $conn->prepare($query);

        // Enlazamos el parámetro y ejecutamos la consulta
        $nombreFiltrado = $nombre . '%';
        $stmt->bind_param("s", $nombreFiltrado);
        $stmt->execute();
        
        // Devolvemos el resultado de la consulta
        return $stmt->get_result();
    }
}

    
?>