<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="preload" href="/bienesraices/build/css/app.css" as="style">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices" class="logo">
                    <img src="/bienesraices/build/img/logo.svg" alt="Logo de la Empresa">
                </a>

                <div class="menu-responsive">
                    <img src="/bienesraices/build/img/barras.svg" alt="Icono Menu Responsive">
                </div>

                <div class="derecha">
                    <img src="/bienesraices/build/img/dark-mode.svg" alt="Boton Drak Mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/bienesraices/nosotros.php">Nosotros</a>
                        <a href="/bienesraices/anuncios.php">Anuncios</a>
                        <a href="/bienesraices/blog.php">Blog</a>
                        <a href="/bienesraices/contacto.php">Contacto</a>
                    </nav>
                </div>


            </div><!-- .barra -->
            <?php if($inicio) { ?>
                <h1>Venta de Casas Y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>