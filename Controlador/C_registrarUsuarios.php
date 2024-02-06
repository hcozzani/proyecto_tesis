<?php
    require '../Modelos/M_registrarUsuarios.php';
    require '../Modelos/M_login.php';
    

    $conexion = new RegistarUsuarios();
    $conexionLogin = new Login();


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $contraseña = $_POST["contraseña"];
        $confirmarContraseña = $_POST["confirmarContraseña"];
        $rolElegido = 'usuario';
        if (isset($_POST["rol"])) {
            $rolElegido = $_POST["rol"];
        }
          
        
        $errores = array();
        //validacion de datos ingresados (nombre y apellido):
        if (empty($nombre) || empty($apellido)) {
            $errores[] = 'Los campos de nombre y apellido son obligatorios.';
        }else if (!preg_match('/^[A-Za-z\s]+$/', $nombre) || !preg_match('/^[A-Za-z\s]+$/', $apellido)) {
            $errores[] = 'Los campos de nombre y apellido solo deben contener letras.';
        }

        if (strlen($nombre) > 50 || strlen($apellido) > 50) {
            $errores[] = 'Los campos de nombre y apellido no deben superar los 50 caracteres.';
        }

        //validacion de datos ingresados (email):

        if (empty($email)) {
            $errores[] = 'El campo de correo electrónico es obligatorio.';
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = 'El correo electrónico no es válido.';
        }

        //validacion de datos ingresados(telefono):

        if (empty($telefono)) {
            $errores[] = 'El campo de teléfono es obligatorio.';
        }else if (!preg_match('/^\d+$/', $telefono)) {
            $errores[] = 'El campo de teléfono solo debe contener números.';
        }

        if (strlen($telefono) > 50) {
            $errores[] = 'El campo de teléfono no debe superar los 50 caracteres.';
        }

        //validacion de datos ingresados(contra):

        if (empty($contraseña)) {
            $errores[] = 'El campo de contraseña es obligatorio.';
        }else if (strlen($contraseña) < 5) {
            $errores[] = 'La contraseña debe tener al menos 5 caracteres.';
        }

        if ($contraseña !== $confirmarContraseña) {
            $errores[] = 'Las contraseñas no coinciden.';
        }

        //si hay algun dato invalido en el array $errores no dejara registrar al usuario:
        if (count($errores) > 0) {
             '<ul>'; // Comienza una lista no ordenada
            foreach ($errores as $error) {
                '<li>' . $error . '</li>'; // Cada error se muestra como un elemento de lista
            }
            echo '</ul>'; // Cierra la lista no ordenada
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var erroresDatosIngresados = document.getElementById("erroresDatosIngresados");
                        if (erroresDatosIngresados) {
                            erroresDatosIngresados.style.display = "block";
                            erroresDatosIngresados.innerHTML = "'.implode('<br>', $errores).'";
                        }
                    });
                  </script>';
            require '../Vistas/V_registrarse.php';
        } else {


            //busca si hay un usuario con ese mail
            $resultado = $conexionLogin->buscarUsuario($email);

            if ($resultado->num_rows > 0) {
                echo '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var emailYaRegistrado = document.getElementById("emailYaRegistrado");
                            if (emailYaRegistrado) {
                                emailYaRegistrado.style.display = "block";
                            }
                        });
                    </script>';
                    require '../Vistas/V_registrarse.php';
                    //header("Location: ../Vistas/V_registrarse.php");
            }else{
                // Genera un salt aleatorio
                $salt = random_bytes(16); 
                $saltHex = bin2hex($salt);

                // Combina la contraseña del usuario con el salt
                $contrasenaConSalt = $contraseña . $saltHex;

                $hashContrasena = password_hash($contrasenaConSalt, PASSWORD_BCRYPT);

                $conexion->registrarUsuario($nombre, $apellido, $email, $telefono, $saltHex, $hashContrasena, $rolElegido);

                require '../Vistas/V_login.php';

                echo '<script>
                        var check = document.getElementById("checkCuentaCreada")
                        check.style.display = "block"
                    </script>';

        }
        }


    }


?>