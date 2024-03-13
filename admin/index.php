<?php
require '../includes/app.php';

use App\Propiedad;

// Implementar un método para obtener todas las propiedades usando active record
$propiedades = Propiedad::all();

// Mostrar mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        // Eliminar el archivo;
        $query = "SELECT imagen FROM propiedades WHERE id = {$id}";

        $resultado =  mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../imagenes/' . $propiedad['imagen']);

        // Eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE id = {$id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: /bienesraices/admin?resultado=3');
        }
    }
}

// Incluye el template
validarLogin();
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Administrador de Biener Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente.</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente.</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta exito">Anuncio Eliminado Correctamente.</p>
    <?php endif; ?>
    <a href="./propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <div class="tabla-responsive">
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
                <?php foreach( $propiedades as $propiedad ): ?>
                    <tr>
                        <td> <?php echo $propiedad->id; ?> </td>
                        <td> <?php echo $propiedad->titulo; ?> </td>
                        <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" class="imagen-tabla"></td>
                        <td>$<?php echo $propiedad->precio; ?> </td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>

<?php
// Cerrar la conexion
mysqli_close($db);
incluirTemplate('footer');
?>