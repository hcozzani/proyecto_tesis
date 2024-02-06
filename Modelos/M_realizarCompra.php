<?php
class CompraModel{
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function comprarProducto($productoTalleId, $cantidadVender) {
        $query = "CALL compraProducto(?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ii", $productoTalleId, $cantidadVender);

        if ($stmt->execute()) {
            return $stmt->affected_rows;
        } else {
            return false; // Error en la compra
        }
    }
}
?>
