<?php

class RegistarUsuarios {
    
    public function registrarUsuario($nombre, $apellido, $email, $telefono, $saltHex, $hashContraseña, $rolElegido) {
        require("conexion.php");

        try {
            $query = "INSERT INTO usuarios (nombre, apellido, email, telefono, valorSalt, hashContrasena, rol)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                
            $resultado = $conn->prepare($query);

            $resultado->bind_param("sssssss", $nombre, $apellido, $email, $telefono, $saltHex, $hashContraseña, $rolElegido);

            $resultado->execute();
            
            return true;
        }catch(Exception $e){
            header("Location: ../Vistas/V_error.php");
        }
    }
    
}

?>