<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<body>
    <header>






        <h1>Productos</h1>

        <!-- Barra de búsqueda -->
        <form action="productos.php" method="GET">

            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"></div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <input type="text" name="busqueda" placeholder="Buscar productos..." class="form-control">
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 text-start">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </div>
            </div>
        </form>
        <button type="button" class="btn btn-outline-info ml-2 mt-3"
            onclick="location.href='index.php'">Volver a página principal</button>
    </header>
    <div class="container">
        <!-- Filtro lateral -->



        <div class="text-center">
            <div class="dropdown col-12">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorias
                </button>
                <ul class="dropdown-menu">
                    <li><a href="productos.php" class="btn btn-light">Todos los productos</a></li>
                    <li><a href="productos.php?categoria=almacenamiento" class="btn btn-light">Almacenamiento</a></li>
                    <li><a href="productos.php?categoria=coolers" class="btn btn-light">Coolers</a></li>
                    <li><a href="productos.php?categoria=cpu" class="btn btn-light">CPU</a></li>
                    <li><a href="productos.php?categoria=liquidas" class="btn btn-light">Líquidas</a></li>
                    <li><a href="productos.php?categoria=monitores" class="btn btn-light">Monitores</a></li>
                    <li><a href="productos.php?categoria=mousepads" class="btn btn-light">Mousepads</a></li>
                    <li><a href="productos.php?categoria=pastatermica" class="btn btn-light">Pasta térmica</a></li>
                    <li><a href="productos.php?categoria=placamadre" class="btn btn-light">Placa madre</a></li>
                    <li><a href="productos.php?categoria=ram" class="btn btn-light">RAM</a></li>
                    <li><a href="productos.php?categoria=ratones" class="btn btn-light">Ratones</a></li>
                    <li><a href="productos.php?categoria=audifonos" class="btn btn-light">Audifonos</a></li>
                    <li><a href="productos.php?categoria=microfonos" class="btn btn-light">Microfonos</a></li>
                    <li><a href="productos.php?categoria=sillas" class="btn btn-light">Sillas</a></li>
                    <li><a href="productos.php?categoria=GPU" class="btn btn-light">Tarjetas gráficas</a></li>
                    <li><a href="productos.php?categoria=fuentes" class="btn btn-light">Fuentes</a></li>
                    <li><a href="productos.php?categoria=teclados" class="btn btn-light">Teclados</a></li>
                    <li><a href="productos.php?categoria=ventiladores" class="btn btn-light">Ventiladores</a></li>
                </ul>

            </div>
        </div>




        <div class="productos row">
            <?php
            // Conexión a la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "cocacola");

            if (mysqli_connect_errno()) {
                echo "Error al conectar con la base de datos: " . mysqli_connect_error();
                exit();
            }

            // Construcción de la consulta SQL
            $sql = "SELECT nombre, descripcion, precio, stock, imagen FROM ";

            // Aplicar filtros si se han enviado desde el formulario
            if (isset($_GET['busqueda'])) {
                echo 'primer busqueda';
                $busqueda = mysqli_real_escape_string($conexion, $_GET['busqueda']);
                $sql .= "almacenamiento WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM coolers WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM fuentes WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM audifonos WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM microfonos WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM cpu WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM liquidas WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM monitores WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM mousepads WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM pastatermica WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM placamadre WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ram WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ratones WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM sillas WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM GPU WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM teclados WHERE nombre LIKE '%$busqueda%' UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ventiladores WHERE nombre LIKE '%$busqueda%'";
            } elseif (isset($_GET['categoria'])) {

                $categoria = mysqli_real_escape_string($conexion, $_GET['categoria']);
                if (in_array($categoria, ["almacenamiento", "coolers", "cpu", "liquidas", "audifonos", "microfonos", "fuentes",  "monitores", "mousepads", "pastatermica", "placamadre", "ram", "ratones", "sillas", "GPU", "teclados", "ventiladores"])) {
                    $sql .= $categoria;

                } else {

                    // Mostrar todos los productos de todas las categorías si la categoría no es válida
                    $sql = "SELECT nombre, descripcion, precio, stock, imagen FROM almacenamiento UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM coolers UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM fuentes UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM cpu UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM liquidas UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM monitores UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM mousepads UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM pastatermica UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM placamadre UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ram UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ratones UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM sillas UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM GPU UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM teclados UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM audifonos UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM microfonos UNION ";
                    $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ventiladores";
                }
            } else {

                // Mostrar todos los productos de todas las categorías si no se ha seleccionado ninguna categoría
                $sql = "SELECT nombre, descripcion, precio, stock, imagen FROM almacenamiento UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM coolers UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM fuentes UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM cpu UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM liquidas UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM monitores UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM mousepads UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM pastatermica UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM placamadre UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ram UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ratones UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM sillas UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM GPU UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM teclados UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM audifonos UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM microfonos UNION ";
                $sql .= "SELECT nombre, descripcion, precio, stock, imagen FROM ventiladores";
            }

            $resultado = mysqli_query($conexion, $sql);

            // Mostrar los productos
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<div class='producto col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12'>";
                echo "<img src='{$fila['imagen']}' alt='{$fila['nombre']}'>";
                echo "<div class='info'>";
                echo "<h2>{$fila['nombre']}</h2>";
                echo "<p>{$fila['descripcion']}</p>";
                echo "<p class='precio'>$ {$fila['precio']}</p>";
                echo "<p>Stock: {$fila['stock']} unidades</p>";
                echo "</div></div>";
            }

            // Cerrar la conexión
            mysqli_close($conexion);
            ?>
        </div>

    </div>

</body>

</html>