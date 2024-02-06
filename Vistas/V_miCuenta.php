<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amor & Moda</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="../Estilos/styleLogin.css">

</head>

<body>

<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbarCustom">
    <div class="logo">
      <a href="/ecommerce/index.php">
          <img src="/ecommerce/img/logo.png" class="logo"  alt="">
      </a>
    </div>
    <div class="botones d-none d-lg-block" style="margin-left:auto; ">
    <a class="navbar-brand" style="background-color: #000000; margin-left: 1%;" href="../index.php">Home </a>
    </div>
      <?php
      
        if (isset($_SESSION['nombre'])) {
          // si el usuario inicio sesion, se muestra 'Cerrar sesion'
          ?> <a class="navbar-brand"  href="/ecommerce/Controlador/C_cerrarSesion.php">Cerrar Sesion </a> <?php
          
        }else{
          // si no inicio sesion, se muestra 'ingresa/registrate'
          ?> <a class="navbar-brand " href="/ecommerce/Vistas/V_login.php" >Ingresa/Registrate  <i class="fas fa-user" style="margin-right: 5%;"></i></a> <?php
        }
        
        if (isset($_SESSION['esadmin']) && $_SESSION['esadmin'] === 'administrador') {
          // El usuario es un administrador, muestra el boton administrar
          ?> 
          <a href="/ecommerce/Controlador/C_productoCrud.php">
            <button type="button" class="btn btn-danger">Administrar</button>
          </a> 
          <?php
        }
      ?>
    
    
  </nav>


    <br><br>

    <main class="row">
        <section class="col-md" id="panel-right">
            <div class="container">
                <br><br>
                <div class="row mb-5">
                    <h2 class="col-12 text-center">Mi cuenta</h2>
                </div>

                <div class="card">
                    <div class="card-header">
                        Datos personales
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $_SESSION['nombre'] ?> <?php echo $_SESSION['apellido'] ?></h5>
                        <p class="card-text"><?php echo $_SESSION['email'] ?></p>
                        <p class="card-text"><?php echo $_SESSION['telefono'] ?></p>
                        <a href="#" class="btn btn-secondary">Editar datos</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    
</body>

</html>