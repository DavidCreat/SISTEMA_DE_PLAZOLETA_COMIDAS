<?php
session_start();
error_reporting(0);
$validar_login = $_SESSION['correo'];
if ($validar_login == null || $validar_login == '') {
  header("Location: login.php");
  die();
}

include("db.php");

// Obtener todas las tiendas
$queryTiendas = "SELECT * FROM tiendas";
$resultTiendas = mysqli_query($conexion, $queryTiendas);

// Obtener todos los productos de cada tienda
$queryProductos = "SELECT p.*, t.nombre AS nombre_tienda
                   FROM plato AS p
                   INNER JOIN tiendas AS t ON p.id_restaurante = t.id";
$resultProductos = mysqli_query($conexion, $queryProductos);

function calcularTotalCarrito()
{
  $total = 0;

  if (isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])) {
    foreach ($_SESSION["carrito"] as $producto) {
      $subtotal = $producto["precio"];
      $total += $subtotal;
    }
  }

  return $total;
}

function quitarDelCarrito($producto_id)
{
  if (isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])) {
    foreach ($_SESSION["carrito"] as $key => $producto) {
      if ($producto["id"] == $producto_id) {
        unset($_SESSION["carrito"][$key]);
        break;
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAZA FESC</title>
    <link rel="stylesheet" href="assets/css/market.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="https://i.ibb.co/T1gMmmQ/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="main-content">
    <header class="container header active" id="home">
        <div class="header-content">
            <div class="left-header">
                <div class="h-shape"></div>
                <div class="image">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/U_Fesc_C%C3%BAcuta_jul_2021.jpg/1200px-U_Fesc_C%C3%BAcuta_jul_2021.jpg" alt="">
                </div>
            </div>
            <div class="right-header">
                <h1 class="name">
                    PLAZA <span>FESC</span>
                </h1>
                <p>COMIDA, BEBIDAS Y MUCHO MAS!</p>
                <div class="btn-con">
                    <a href="cerrar_sesion_Market.php" class="main-btn">
                        <span class="btn-text">CERRAR SESION</span>
                        <span class="btn-icon"><i class="fas fa-user"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="container" id="portfolio">
            <div class="main-title">
                <h2>MOSAICO DE <span>FOTOS</span><span class="bg-text">TIENDA FESC</span></h2>
            </div>
            <p class="port-text">
                Aqui veras fotos referente a nosotros.
            </p>
            <div class="portfolios">
                <div class="portfolio-item">
                    <div class="image">
                        <img src="assets/images/EAS1.jpg" alt="">
                    </div>
                    <div class="hover-items">
                        <h3>VER FOTO</h3>
                        <div class="icons">
                                <a href="https://web.facebook.com/Fesc.edusuperior?_rdc=1&_rdr" class="icon" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/fesc_superior" class="icon" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.youtube.com/@TuTeleFESC" class="icon" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="https://www.instagram.com/fesc.edusuperior/?hl=es-la" class="icon" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://github.com/DavidCreat" class="icon" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="image">
                        <img src="assets/images/EAS1.jpg" alt="">
                    </div>
                    <div class="hover-items">
                    <h3>VER FOTO</h3>
                        <div class="icons">
                                <a href="https://web.facebook.com/Fesc.edusuperior?_rdc=1&_rdr" class="icon" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/fesc_superior" class="icon" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.youtube.com/@TuTeleFESC" class="icon" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="https://www.instagram.com/fesc.edusuperior/?hl=es-la" class="icon" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://github.com/DavidCreat" class="icon" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                        </div>
                    </div>
                </div>
 



                    </div>
                </div>
            </div>
        </section>

        <section class="container" id="blogs">
  <?php while ($tienda = mysqli_fetch_assoc($resultTiendas)) : ?>
    <?php
      // Obtener todos los productos de la tienda actual
      $queryProductos = "SELECT p.*, t.nombre AS nombre_tienda
                         FROM plato AS p
                         INNER JOIN tiendas AS t ON p.id_restaurante = t.id
                         WHERE p.estado = 1 AND t.id = " . $tienda['id'];
      $resultProductos = mysqli_query($conexion, $queryProductos);
    ?>

    <div class="blogs-content">
      <div class="main-title">
        <h2><?php echo $tienda["nombre"]; ?><span><?php echo $tienda["id"]; ?></span><span class="bg-text">TIENDA</span></h2>
      </div>
      <div class="blogs">
        <?php while ($producto = mysqli_fetch_assoc($resultProductos)) : ?>
          <div class="blog">
            <div class="blog-text">
              <h4><?php echo $producto["nombre"]; ?></h4>
              <p>
                Precio: <?php echo $producto["precio"]; ?><br>
                Categoría: <?php echo $producto["categoria"]; ?><br>
                Estado: <?php echo $producto["estado"]; ?>
              </p>
              <!-- Agregar botón con diseño bonito utilizando Bootstrap para agregar al carrito de compras y realizar el pago por PayPal -->
              <form action="agregar_al_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                <button> <a type="submit" class="add-summit"><span></span>Agregar</a></button>
              </form>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endwhile; ?>  

  <br>
  <div class="blogs-content">
      <div class="main-title">
  <h2>Carrito de Compras</h2>
      </div>
  <div class="carrito-content">
  <div class="blogs">
  <div class="blog">
            <div class="blog-text">
    <?php if (isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])) : ?>
      <?php foreach ($_SESSION["carrito"] as $producto) : ?>
        <div class="carrito-item">
          <h1><?php echo $producto["nombre"]; ?></h1>
          <p>Precio: <?php echo $producto["precio"]; ?></p>
          <form action="quitar_del_carrito.php" method="POST">
            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
            <button> <a type="submit" class="eliminate-summit"><span></span>Eliminar del  carrito</a></button>
          </form>
        </div>
        
      <?php endforeach; ?>

      <h4>Total: <?php echo calcularTotalCarrito(); ?></h4>
      <?php  
            include 'paypal/pagoPaypal.php';
        ?>
    <?php else : ?>
      <p>No hay productos en el carrito.</p>
    <?php endif; ?>
  </div>
</section>

<?php
  // Función para obtener el nombre de un producto dado su ID
  function obtenerNombreProducto($producto_id) {
    // Realizar la consulta a la base de datos para obtener el nombre del producto
    // Puedes usar la conexión y ejecutar la consulta aquí
    // Devolver el nombre del producto encontrado
  }

  // Función para calcular el precio total de los productos en el carrito
  function calcularPrecioTotal() {
    $total = 0;
    foreach ($_SESSION["carrito"] as $producto) {
      $total += $producto["precio"];
    }
    return $total;
  }
?>
</section>
</div>





        <section class="container contact" id="contact">
            <div class="contact-container">
                <div class="main-title">
                    <h2>OPINIONES <span>FESC</span><span class="bg-text">PLAZA</span></h2>
                </div>
                <div class="contact-content-con">
                    <div class="left-contact">
                        <div class="contact-icons">
                            <div class="contact-icon">
                                <a href="https://web.facebook.com/Fesc.edusuperior?_rdc=1&_rdr" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/fesc_superior" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.youtube.com/@TuTeleFESC" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="https://www.instagram.com/fesc.edusuperior/?hl=es-la" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://github.com/DavidCreat" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-contact">
                        <form action="" class="contact-form">
                            <div class="input-control">
                                <input type="text" required placeholder="TITULO DE LA SUGERENCIA">
                            </div>
                            <div class="input-control">
                                <textarea name="" id="" cols="15" rows="8" placeholder="mensaje de la sugerencia aqui..."></textarea>
                            </div>
                            <div class="submit-btn">
                                <a href="cerrar_sesion_Market.php" class="main-btn">
                                    <span class="btn-text">CERRAR SESIÓN</span>
                                    <span class="btn-icon"><i class="fas fa-user"></i></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="controls">
        <div class="control active-btn" data-id="home" >
            <i class="fas fa-home"></i>
        </div>
        <div class="control" data-id="portfolio">
            <i class="fas fa-camera"></i>
        </div>
        <div class="control" data-id="blogs">
            <i class="fas fa-store"></i>
        </div>
        <div class="control" data-id="contact">
            <i class="fas fa-envelope-open"></i>
        </div>
    </div>
    <div class="theme-btn">
        <i class="fas fa-adjust"></i>
    </div>
    <script src="app.js"></script>
</body>
</html>