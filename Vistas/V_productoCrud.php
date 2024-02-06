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
  <link rel="stylesheet" href="/ecommerce/Estilos/styleLogin.css">
</head>
<body>
    <?php
    // Verificar si el usuario es un administrador
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['esadmin']) && $_SESSION['esadmin'] === 'administrador') {
        // El usuario es un administrador, muestra el contenido de la vista
    ?>

        <nav class="navbar navbar-expand-lg navbarCustom">
            <div class="logo">
            <a href="/ecommerce/index.php">
                <img src="/ecommerce/img/logo.png" class="logo"  alt="">
            </a>
            </div>
            <div class="botones d-none d-lg-block" style="margin-left:auto; ">
            <a class="navbar-brand " href="/ecommerce/Vistas/V_registrarse.php" >Registrar admin  <i class="fas fa-user" style="margin-right: 5%;"></i></a> 
            <?php
                if (isset($_SESSION['nombre'])) {
                // si el usuario inicio sesion, se muestra 'Cerrar sesion'
                ?> <a class="navbar-brand"  href="/ecommerce/Controlador/C_cerrarSesion.php">Cerrar Sesion </a> <?php
                }else{
                // si no inicio sesion, se muestra 'ingresa/registrate'
                ?> <?php
                }
            ?>
            <a class="navbar-brand"  href="/ecommerce/index.php">Home </a>
            </div>
        </nav>

        <div class="ContenedorProductos">
            <div class="container mt-4">
                <h1>CRUD de Productos</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($datosProductosCrud)) { ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td>$<?php echo $fila['precioVenta']; ?></td>
                                <td><?php echo $fila['categoriaNombre']; ?></td>
                                <td>
                                    <a href="../Vistas/V_formProductoMod.php?id=<?php echo $fila['id'];?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i> Editar
                                    </a>
                                    <a href="../Controlador/C_productoBorrar.php?id=<?php echo $fila['id'];?>" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                    <a href="../Vistas/V_formAgregarStock.php?id=<?php echo $fila['id'];?>" class= "btn btn-success btn-sm">
                                        <i class="fas fa-plus b"></i>  Agregar stock
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="../Vistas/V_formProductoAlta.php" class="btn btn-success">Agregar Producto</a>
            </div>
        </div>
        <?php
    } else {
        // El usuario no es un administrador, puedes mostrar un mensaje o redirigir a otra página
        echo "No tienes permisos para acceder a esta página.";
        // O puedes redirigir al usuario a otra página:
        // header("Location: otra_pagina.php");
    }

    ?>


</body>
</html>
