<?php
require '../includes/app.php';

use App\Propiedad;
use App\Vendedor;

// Implementar un método para obtener todas las propiedades usando active record
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();

// Mostrar mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        $tipo = $_POST['tipo'];
        
        if(validarTipoContenido($tipo)) {
            
            // Compara lo que vamos a eliminar

            if($tipo === 'vendedor') {
                $vendedor = Vendedor::find($id);
                $vendedor -> eliminar(); 
            } elseif ($tipo === 'propiedad') {
                $propiedad = Propiedad::find($id);
                $propiedad -> eliminar(); 
            }
        }                       
    }
}

// Incluye el template
validarLogin();
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Administrador de Biener Raices</h1>
    <?php $mensaje = mostrarNotificacion(intval($resultado))?>
    <?php if($mensaje): ?>
        <p class="alerta exito"><?php echo sanitizarHTML($mensaje); ?></p>
    <?php endif; ?>
    <a href="./propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    <a href="./vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>

    <h2>Propiedades</h2>

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
                        <td> <?php echo sanitizarHTML($propiedad-> id); ?> </td>
                        <td> <?php echo sanitizarHTML($propiedad->titulo); ?> </td>
                        <td><img src="../imagenes/<?php echo sanitizarHTML($propiedad->imagen); ?>" alt="Imagen de la propiedad" class="imagen-tabla"></td>
                        <td>$<?php echo sanitizarHTML($propiedad->precio); ?> </td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo sanitizarHTML($propiedad->id); ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="../admin/propiedades/actualizar.php?id=<?php echo sanitizarHTML($propiedad->id); ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="tabla-responsive">
        <h2>Vendedores</h2>
        <table class="vendedores">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendedores as $vendedor) { ?>
                    <tr>
                        <td><?php echo sanitizarHTML($vendedor -> id); ?></td>
                        <td><?php echo sanitizarHTML($vendedor -> nombre) . " " .sanitizarHTML($vendedor -> apellido); ?></td>  
                        <td><a href="mailto:<?php echo sanitizarHTML($vendedor -> email); ?>"><?php echo sanitizarHTML($vendedor -> email); ?></a></td>                      
                        <td><a href="tel:<?php echo sanitizarHTML($vendedor -> telefono); ?>"><?php echo sanitizarHTML($vendedor -> telefono); ?></a></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo sanitizarHTML($vendedor -> id);?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" value="Eliminar" class="boton-rojo-block">
                            </form>
                            <a href="../admin/vendedores/actualizar.php?id=<?php echo sanitizarHTML($vendedor -> id); ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>

<?php
incluirTemplate('footer');
?>