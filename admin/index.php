<?php

// Importar la conexion
require '../includes/config/database.php';
$db = conectarDB();

// Escribir el query
$query = "SELECT * FROM propiedades";

// Consultar la bd
$resultadoQuery = mysqli_query($db, $query);


// Mostrar mensaje condicional
$resultado = $_GET['resultado'] ?? null;

// Incluye el template
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Administrador de Biener Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio creado correctamente.</p>
    <?php endif; ?>
    <a href="./propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- Mostrar resultados -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoQuery)) : ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td> <?php echo $propiedad['titulo']; ?> </td>
                    <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad['precio']; ?> </td>
                    <td>
                        <a href=#" class="boton-rojo-block">Eliminar</a>
                        <a href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
// Cerrar la conexion
mysqli_close($db);
incluirTemplate('footer');
?>