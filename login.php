<?php
    require 'includes/app.php';    

    $db = conectarDB();

    $errores = [];

    //Autenticar el usuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errores[] = "El correo es obligatorio o no es válido.";
        }

        if(!$password) {
            $errores[] = "El password es obligatorio.";
        }

        if(empty($errores)) {
            // Revisar si el usuario existe

            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);

            if($resultado -> num_rows) {
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if ($auth) {
                    // El usuario está autenticado
                    session_start();
                
                    // Llenar el arreglo
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;    
                    
                    header('Location: /bienesraices/admin/');

                } else {                    
                    $errores[] = "El password es incorrecto";
                }
                
            } else {
                $errores[] = "El usuario {$email} no existe";
            }
        }
    }

    // Incluye el header    
    incluirTemplate('header');

    if(session_status()==='PHP_SESSION_NONE') {
        session_start();
    }
    if(isset($_SESSION['usuario'])) {
        header('Location: /bienesraices/admin');
        exit;
    }
?>

<main class="contenedor contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="post">
        <fieldset>
            <legend>Email y Contraseña</legend>            
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Escribe tu email.">            
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Escribe tu contraseña">            
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>

<?php incluirTemplate('footer'); ?>