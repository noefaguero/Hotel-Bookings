<?php

// Lista blanca de controladores
const controladores = ["Users", "Hotels", "HotelRooms", "Bookings", "BookingHotelRoom", "Errors"];

// Definir controlador
$nombreControlador = 'Users'; // controlador del login por defecto
if (isset($_GET["c"])) {
    $nombreControlador = filter_input(INPUT_GET, "c", FILTER_SANITIZE_STRING);
    if (!in_array($nombreControlador, controladores)) {
        echo $nombreControlador;
        //header('Location: ./index.php?c=Errors');
        exit;
    };
} 

// Cargar documento del controlador
include_once './controllers/' . strtolower($nombreControlador) . 'Controller.php';

// Instanciar controlador especificando su nombre
$claseControlador = $nombreControlador . 'Controller';
$objControlador = new $claseControlador();

// Definir acción
$accion = "show"; // acción por defecto
if (isset($_GET['a'])) {
    $accion = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
    if (!method_exists($objControlador, $accion)) {
        header('Location: ./index.php?c=Errors');
        exit;
    }
}

// Llamada a la acción a partir del objeto del controlador
$view = $objControlador->$accion();

?>

<!-- HEAD -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($view->metadata) echo $view->metadata; ?>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <?php if ($view->styleSheets) echo $view->styleSheets; ?>
    <script defer src="./js/bootstrap.bundle.min.js"></script>
    <?php if ($view->scripts) echo $view->scripts; ?>
    <title><?php echo $view->title ?></title>
</head>
<!-- BODY -->
<body class="bg-black">
    <?php

    if ($view->header) include_once "./views/templates/header.php";
    
    echo $view->main;

    ?>
    <footer class="container-fluid text-center bg-card mt-5">
        <div class="container d-flex flex-column justify-content-between">
            <h2 class="p-3 mt-5 fs-3">SÍGUENOS</h2>
            <section class="d-flex justify-content-center align-items-center py-3 mb-5">
                <a class="col-4 col-md-2 p-2" target="_blank" href="#">
                    <img class="footer__logo img-fluid" src="./assets/images/twitter.png" alt="#">
                </a>
                <a class="col-4 col-md-2 p-2" target="_blank" href="#">
                    <img class="footer__logo img-fluid" src="./assets/images/facebook.png" alt="#">
                </a>
                <a class="col-4 col-md-2 p-2" target="_blank" href="#">
                    <img class="footer__logo img-fluid" src="./assets/images/instagram.png" alt="#">
                </a>
            </section>
            <section class="d-flex flex-column align-items-center py-3">
                <ul class="nav gap-2 justify-content-center flex-wrap">
                    <li class="nav-item"><a class="nav-link text-orange px-4" href="#">AVISO LEGAL</a></li>
                    <li class="nav-item"><a class="nav-link text-orange px-4" href="#">POLÍTICA DE PRIVACIDAD</a></li>
                    <li class="nav-item"><a class="nav-link text-orange px-4" href="#">POLÍTICA DE COOKIES</a></li>
                    <li class="nav-item"><a class="nav-link text-orange px-4" href="#">CONDICIONES DE VENTA</a></li>
                    <li class="nav-item"><a class="nav-link text-orange px-4" href="#">CONTACTO</a></li>
                </ul>
            </section>
            <section class="py-3">
                <p class="text-center"> Última conexión: <?php if (isset($_COOKIE['lastConnection'])) echo htmlspecialchars($_COOKIE['lastConnection']); ?></p>
            </section>
		</div>
    </footer>
</body>