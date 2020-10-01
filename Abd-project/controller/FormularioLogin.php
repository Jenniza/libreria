<?php
include '../model/Usuario.php';
include '../config/config.php';
if (! isset($_POST['login']) ) {
	header('Location: login.php');
	exit();
}


$erroresFormulario = array();

$nombreUsuario = isset($_POST['mail']) ? $_POST['mail'] : null;

if ( empty($nombreUsuario) ) {
	$erroresFormulario[] = "El nombre de usuario no puede estar vacío";
}

$password = isset($_POST['psw']) ? $_POST['psw'] : null;
if ( empty($password) ) {
	$erroresFormulario[] = "El password no puede estar vacío.";
}

if (count($erroresFormulario) === 0) {
    $usuario = Usuario::buscaUsuario($nombreUsuario);

	if (!$usuario) {
		$erroresFormulario[] = "El usuario o el password no coinciden";
	} else {
	    if ( $usuario->compruebaPassword($password) ) {
    		$_SESSION['login'] = true;
    		$_SESSION['nombre'] = $nombreUsuario;
    		$_SESSION['esAdmin'] = strcmp($fila['rol'], 'admin') == 0 ? true : false;
    		header('Location: ../index.php');
    		exit();
	    } else {
	        $erroresFormulario[] = "El usuario o el password no coinciden";
	    }
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
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
                header('Refresh: 5; URL=http://localhost/libreria-master/Abd-project/index.php');
            }
            foreach($erroresFormulario as $error) {
                echo "<li>$error</li>";
             header('Refresh: 5; URL=http://localhost/libreria-master/Abd-project/index.php');
            }
            if (count($erroresFormulario) > 0) {
                echo '</ul>';
                 header('Refresh: 5; URL=http://localhost/libreria-master/Abd-project/index.php');
            }
?>
		
<?php
		}
?>

	</div>




</div>

</body>
</html>