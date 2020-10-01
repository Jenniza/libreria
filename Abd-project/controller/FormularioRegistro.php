<?php
    include '../config/config.php';
    include '../model/Usuario.php';
    if (! isset($_POST['REGISTRASE']) ) {
        header('Location: ../view/signup.php');
        exit();
    }


    $erroresFormulario = array();

    $nombreUsuario = isset($_POST['uname']) ? $_POST['uname'] : null;

    if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
        $erroresFormulario[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
    }

    $email = isset($_POST['mail']) ? $_POST['mail'] : null;
    var_dump($email);
    if ( empty($email) || mb_strlen($email) < 5 ) {
        $erroresFormulario[] = "El mail tiene que tener una longitud de al menos 5 caracteres.";
    }

    $password = isset($_POST['psw']) ? $_POST['psw'] : null;
    if ( empty($password) || mb_strlen($password) < 5 ) {
        $erroresFormulario[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
    }
    $password2 = isset($_POST['psw2']) ? $_POST['psw2'] : null;
    if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
        $erroresFormulario[] = "Los passwords deben coincidir";
    }

    if (count($erroresFormulario) === 0) {
        $usuario = usuario::crea($email, $nombreUsuario, $password, 0);

        if (! $usuario ) {
            $erroresFormulario[] = "El usuario ya existe";
        } else {
            $_SESSION['login'] = true;
            $_SESSION['nombre'] = $nombreUsuario;
            header('Location: ../index.php');
            exit();

        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registro</title>
</head>

<body>

    <div id="contenedor">

	<div id="contenido">

	<?php
		if (isset($_SESSION["login"])) {
			echo "<h1>Bienvenido ". $_SESSION['nombre'] . "</h1>";
			echo "<p>Usa el menú de la izquierda para navegar.</p>";
		} else {
			echo "<h1>ERROR</h1>";
            if (count($erroresFormulario) > 0) {
                echo '<ul class="errores">';
                echo '<a class="reg" href="../view/signup.php">volver</a>';
            }
            foreach($erroresFormulario as $error) {
                echo "<li>$error</li>";
                echo '<a class="reg" href="../view/signup.php">volver</a>';
            }
            if (count($erroresFormulario) > 0) {
                echo '</ul>';
                echo '<a class="reg" href="../view/signup.php">volver</a>';
            }
?>
		
<?php
		}
?>

	</div>




</div>

</body>
</html>

