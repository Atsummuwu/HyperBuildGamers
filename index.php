<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario']; // Obtener el nombre de usuario desde la sesión
    //echo 'Usuario Iniciado';
} else {
    //echo 'Usuario NO Iniciado';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HyperBuild Gamers</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="styles.css">
    <!-- Estilos adicionales para el deslizador -->
    <style>
        .carousel-item img {
            margin: 10px 105px;
            /* Añadir margen vertical de 20px y margen lateral de 10px */
            max-width: 900px;
            /* Ancho máximo de las imágenes */
            max-height: 600px;
            /* Altura máxima de las imágenes */
        }
    </style>

    <style>
        .navbar {
            background-image: url('imagenes/nav.gif');
            /* Reemplaza 'ruta/a/tu/imagen.jpg' con la ruta de tu imagen */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    <style>
        /* Estilo para el fondo de toda la página */
        body {
            background-image: url('imagenes/wallpaper2.jpg');
            /* Si deseas ajustar la repetición de la imagen */
            background-repeat: no-repeat;
            /* Evita que la imagen se repita */
            background-size: cover;
            /* Ajusta el tamaño de la imagen para cubrir toda la pantalla */
            /* Opcional: puedes agregar más propiedades para personalizar el aspecto del fondo */
        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">HyperBuild Gamers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Crea tu pc</a>
                </li>
                <li class="nav-item">
                    <?php

                    if (isset($nombreUsuario)) {
                        echo '<a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a>';
                    } else {
                        echo '<a class="nav-link" href="InicioSesion.php">Iniciar sesión</a>';
                    }


                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <!-- Recuadro de imágenes con deslizador -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imagenes/1.jpg" alt="Primera imagen">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/2.png" alt="Segunda imagen">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/3.jpg" alt="Tercera imagen">
                </div>
                <!-- Puedes agregar más imágenes aquí -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>

    <!-- Mostrar el saludo si el usuario ha iniciado sesión -->
    <?php if (isset($nombreUsuario)): ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <div class="card">
                        <div class="card-body">
                            ¡Hola, <?php echo $nombreUsuario; ?>!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript Personalizado -->
    <script src="script.js"></script>
</body>

</html>