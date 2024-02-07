<?php

// Validar url por id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /bienesraices/admin');
}

require '../../includes/config/database.php';

$db = conectarDB();

// Obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = {$id}";
$resultado = mysqli_query($db, $consulta);

$propiedad = mysqli_fetch_assoc($resultado);

// echo "<pre>";
// var_dump($propiedad);
// echo "</pre>";

// Consultar el listado de los vendedores, desde la BD

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedores_id = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];


if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    // Asignar files a una imagen 

    $imagen = $_FILES['imagen'];


    if (!$titulo) {
        $errores[] = "Debes añadir un titulo.";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio.";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres.";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir el número de habitaciones.";
    }
    if (!$wc) {
        $errores[] = "El número de baños es obligatorio.";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes añadir la cantidad de estacionamientos de la propiedad.";
    }
    if (!$vendedores_id) {
        $errores[] = "Debes elegir un vendedor.";
    }

    // Validar por peso 5MB

    $medida = 1024 * 5120;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada.";
    }

    if (empty($errores)) {

        // Subida de imagenes en PHP

        //Crear una carpeta
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';

        if ($imagen['name']) {

            // Eliminar imagen anterior
            unlink($carpetaImagenes . $propiedad['imagen']);

            // Generar un nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            // Subir la imagen a la carpeta

            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            // Isertar en la base de datos

        } else {
            $nombreImagen = $propiedad['imagen'];
        }

        $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio}, imagen = '{$nombreImagen}', descripcion =  '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedores_id} WHERE id = {$id}";

        // echo $query;




        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /bienesraices/admin?resultado=2');
        }
    }
}

require '../../includes/funciones.php';
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
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo </label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad." value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="Precio de tu propiedad." value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
            <img class="imagen-sm" src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="Imagen de la propiedad">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Cantidad de Habitaciones</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Cantidad de Baños</label>
            <input type="number" name="wc" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Cantidad de Estacionamientos</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="vendedor">
                <option value="">-- Seleccionar --</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>