<!DOCTYPE html>
<html>
<head>
    <?php?>
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <?php include 'layout/head.php'; ?>
   <legend>Iniciar Sesion</legend>
    <form action="../controller/FormularioLogin.php" method="POST">
        <div class="campos-formulario">
            <h4>Email</h4> <input class ="input-box" type="text" name="mail" placeholder="Introduce tu e-mail" required>

            <h4>Contraseña</h4>	<input class ="input-box" type="password" name="psw" placeholder="Introduce una contraseña entre 8 y 16 caracteres" required>
            <p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>

            </div>
            <div class="submit-formulario">
                <input type="button" value="REGISTRARSE" class ="boton-formulario2" onclick="location.href='signup.php'">
                <input type="submit" name="login"  class ="boton-formulario">
            </div>
    </form>
    
</body>

</html>
