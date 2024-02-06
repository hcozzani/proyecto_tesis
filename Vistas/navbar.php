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
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  ?>

  <nav class="navbar navbar-expand-lg navbarCustom">
    <div class="logo">
      <a href="/ecommerce/index.php">
          <img src="/ecommerce/img/logo.png" class="logo"  alt="">
      </a>
    </div>
    <div class="botones d-none d-lg-block" style="margin-left:auto; ">
      <a class="navbar-brand " data-bs-toggle="modal" data-bs-target="#exampleModal">Buscar  <i class="fas fa-search" ></i></a>
      <a class="navbar-brand " href="/ecommerce/Vistas/V_carrito.php">Carrito  <i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
      <?php
        if (isset($_SESSION['nombre'])) {
          // si el usuario inicio sesion, se muestra 'Cerrar sesion'
          ?> <a class="navbar-brand " href="/ecommerce/Vistas/V_miCuenta.php" >Mi cuenta <i class="fas fa-user" style="margin-right: 5%;"></i></a> <?php
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
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">¿Que estas buscando?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <form class="ContenedorFormFiltrado" action="/ecommerce/Controlador/C_filtrado.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">   
                <div>
                  <input type="text" class="form-control" name="producto" />
                  <div id="filtrado" class="form-text"></div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Buscar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
        
  <!-- Modal del Carrito -->
  <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="carritoModalLabel">Tu Carrito de Compras</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Aquí puedes agregar la lista de productos en el carrito -->
          <ul>
            <!-- Agrega más productos aquí -->
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Comprar</button>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>