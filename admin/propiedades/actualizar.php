<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

require '../../includes/app.php';

// Validar url por id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /bienesraices/admin');
}
// Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);
$vendedores = Vendedor::all();

// Consultar el listado de los vendedores, desde la BD
$errores = Propiedad::getErrores();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {    
    // Asignar Atributos
    $args = $_POST['propiedad'];
    $propiedad -> sincronizar($args);

    // Validación
    $errores = $propiedad -> validarForm();

    // Generar un nombre unico para la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Subida de imagenes
    $manager = new Image(Driver::class);
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            // Almacenar la imagen
            $image -> save(CARPETA_IMAGENES . $nombreImagen);
        }        

        $resultado = $propiedad -> guardar();
        
    }
}
validarLogin();
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Actualizar una Propiedad</h1>
    <a href="/bienesraices/admin" class="boton boton-verde">Regresar</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form class="formulario" method="post" autocomplete="off" enctype="multipart/form-data">
        <?php include('../../includes/templates/formulario_propiedades.php'); ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>