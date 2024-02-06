<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amor & Moda</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;700;900&display=swap"
        rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="../Estilos/styleLogin.css">

</head>

<body>

    <?php session_start(); ?>

    <nav class="navbar navbar-expand-lg navbarCustom">
        <div class="logo">
        <a href="/ecommerce/index.php">
            <img src="../img/logo.png" class="logo"  alt="">
        </a>
        </div>

        <div class="botones d-none d-lg-block" style="margin-left:auto; ">
        <?php
            if (isset($_SESSION['nombre'])) {
                // La sesión está iniciada; el usuario ha iniciado sesión
            ?> <a class="navbar-brand" style="background-color: #000000; margin-left: 1%;" href="../Controlador/C_cerrarSesion.php">Cerrar Sesion </a> <?php
            }else {
                // La sesión no está iniciada; el usuario no ha iniciado sesión
                ?> 

                    
                    <a class="navbar-brand" style="background-color: #000000;" href="/ecommerce/Vistas/V_login.php"> Iniciar sesion  <i class="fas fa-user" style="margin-right: 5%;"></i></a>

                <?php
            }?>
        </div>
        <a class="navbar-brand" style="background-color: #000000; margin-left: 1%;" href="../index.php">Home </a>
        
    </nav>

    <br><br><br><br>


    <main class="row">
        <section class="col-md" id="panel-right">
            <div class="container">

                <h5 class="col-12 text-center" id="emailYaRegistrado" style="color:crimson; display:none;">El email
                    ingresado ya está registrado! <i class="fa fa-exclamation-circle" aria-hidden="true"></i></h5>
                <h5 class="col-12 text-center" id="erroresDatosIngresados" style="color:crimson; display:none;"> <i
                        class="fa fa-exclamation-circle" aria-hidden="true"></i></h5>

                <br>
                <div class="row mb-5">
                    <h2 class="col-12 text-center">Crear cuenta</h2>
                </div>
                <div class="row">
                    <form action="../Controlador/C_registrarUsuarios.php" class="col-12 col-md-8 offset-md-2"
                        method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Correo electrónico" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="telefono" id="telefono"
                                placeholder="Telefono">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="contraseña" id="contraseña"
                                placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmarContraseña"
                                id="confirmarContraseña" placeholder="Confirmar contraseña" required>
                        </div>
                        <br>
                        
                        <?php
                        // Verificar si el usuario es un administrador
                        
                        if (isset($_SESSION['esadmin']) && $_SESSION['esadmin'] === 'administrador') {
                            // El usuario es un administrador, muestra el contenido de la vista
                            ?>
                            <!-- solo admin -->
                            <div class="form-group">
                                <label for="rol">Selecciona el rol del usuario :</label>
                                <select id="rol" name="rol" style="display: center; width: 100%; text-align: center; " >
                                    <option value="administrador">Administrador</option>
                                    <option value="vendedor">Vendedor</option>
                                </select>
                            </div>
                        <?php } ?>

                        <div class="form-group text-center pt-4">
                            <input type="submit" class="btn btn-primary" value="Crear cuenta">
                        </div>

                    </form>
                </div>
                <div class="row mt-5">
                    <div class="col-12 links text-center">
                        <div>
                            <a href="./V_login.php" style="background-color: white;">¿Ya tenés una cuenta? Iniciá sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>