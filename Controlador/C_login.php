<?php
    require '../Modelos/M_login.php';
    

    $conexion = new Login();


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $emailIngresado = $_POST["email"];
        $contraseñaIngresada = $_POST["password"];

        // Combina la contraseña del usuario con el salt


        $resultado = $conexion->buscarUsuario($emailIngresado);

    // Comprueba si se encontró un usuario con ese correo
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $valorSaltBD = $fila["valorSalt"];
            $hashContrasenaBD = $fila["hashContrasena"];

            $comprobarContrasena = $contraseñaIngresada . $valorSaltBD;

            // Verifica la contraseña proporcionada con la almacenada en la base de datos
            if (password_verify($comprobarContrasena, $hashContrasenaBD)) {
                session_start();
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['apellido'] = $fila['apellido'];
                $_SESSION['email'] = $fila['email'];
                $_SESSION['telefono'] = $fila['telefono'];
                $_SESSION['esadmin'] = $fila['rol'];
                if ($fila['rol'] == 'administrador') {
                    header("Location: ../Controlador/C_productoCrud.php");
                } else {
                    header("Location: ../index.php");
                }
            } 
        }

        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var datosIncorrectos = document.getElementById("datosIncorrectos");
                    if (datosIncorrectos) {
                        datosIncorrectos.style.display = "block";
                    }
                });
            </script>';

    }

    require '../Vistas/V_login.php';

?>