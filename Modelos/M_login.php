<?php

class Login {

    public function buscarUsuario($email) {
        require("conexion.php");

        try {
            $query = "SELECT * FROM usuarios WHERE email = ?";
                
            $resultado = $conn->prepare($query);

            $resultado->bind_param("s", $email);

            $resultado->execute();

            $resultado = $resultado->get_result();

            return $resultado;
            
        }catch(Exception $e){
            header("Location: ../Vistas/V_error.php");
        }
    }
}

?>