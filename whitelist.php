<?php

// Obtener el valor de la página desde la URL, con un valor predeterminado de 'dashboard'
$pagina = $_GET['pagina'] ?? 'dashboard';

// Lista blanca de páginas permitidas
$navs = [
    'dashboard', // Página principal
    // Agrega aquí más páginas permitidas si es necesario
];

// Validar si la página solicitada está en la lista blanca
if (in_array($pagina, $navs, true)) {
    // Incluir la página solicitada si está permitida
    include "view/pages/$pagina.php";
} else {
    // Incluir la página de error 404 si la página no está permitida
    include "view/pages/404.php";
}
