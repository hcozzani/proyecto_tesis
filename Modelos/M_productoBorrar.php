<?php

class ProductoBorrar{
    private $conn;

    public function eliminarProducto($id){         
        require ("conexion.php");
        $fechaActual = date('Y-m-d H:i:s');
        // session_start();
        // $usuario = $_SESSION['nombre'];

        // $query = "DELETE FROM productos WHERE Id = $id";
        $query = "UPDATE productos SET fechaBaja = ?, usuarioBaja = user() WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $fechaActual, $id);
        $stmt->execute();
        
        return $stmt->affected_rows;
    }
}

    
?>