<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ya ha iniciado sesión, si es así, redirigirlo a la página de inicio
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: PaginaPrincipal.html");
    exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "cocacola");

    // Verificar la conexión
    if (mysqli_connect_errno()) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Recuperar el correo electrónico y la contraseña del formulario
    $correo = $_POST['loginEmail'];
    $contrasena = $_POST['loginPassword'];

    // Preparar la consulta SQL para buscar el usuario en la base de datos
    $sql = "SELECT correo_electronico, contrasena FROM usuarios WHERE correo_electronico = '$correo'";

    // Ejecutar la consulta SQL
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si se encontró el usuario
    if (mysqli_num_rows($resultado) == 1) {
        // Obtener la fila del resultado como un array asociativo
        $fila = mysqli_fetch_assoc($resultado);
        // Verificar la contraseña utilizando password_verify
        if (password_verify($contrasena, $fila['contrasena'])) {
            // Iniciar la sesión
            session_start();
            // Almacenar datos de sesión
            $_SESSION["loggedin"] = true;
            $_SESSION["correo"] = $correo;
            // Redirigir al usuario a la página de bienvenida
            header("location: PaginaPrincipal.html");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El correo electrónico ingresado no está registrado.";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>