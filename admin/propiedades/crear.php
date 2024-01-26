<?php

require '../../includes/config/database.php';

$db = conectarDB();

// Consultar el listado de los vendedores, desde la BD

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$creado = date('Y/m/d');
$vendedores_id = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    /*     echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
 */
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);

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

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    if (empty($errores)) {
        // Isertar en la base de datos

        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id')";

        // echo $query;


        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /bienesraices/admin/index.php');
        }
    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Crear Propiedad</h1>
    <a href="/bienesraices/admin/index.php" class="boton boton-verde">Regresar</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form action="/bienesraices/admin/propiedades/crear.php" class="formulario" method="post" autocomplete="off">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo </label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad." value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="Precio de tu propiedad." value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

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
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>