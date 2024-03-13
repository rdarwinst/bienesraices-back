<?php
declare (strict_types = 1);

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES',  __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false) {    
    include TEMPLATES_URL . "/{$nombre}.php";
}

function validarLogin() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /bienesraices');
    } 
    
}

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function sanitizarHTML($input) {
    $entrada = htmlspecialchars($input);
    return $entrada;
}