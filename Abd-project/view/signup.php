<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<title>Registro</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	 <legend>Registro</legend>
        <form action="../controller/FormularioRegistro.php" method="POST">
          <div class="campos-formulario">
              <h4>Nombre de usuario</h4>
              <input class ="input-box" type="text" placeholder="Introduce tu nombre de usuario" name="uname" required>

              <h4>Email</h4>
              <input class ="input-box" type="email" placeholder="Introduce tu Email" name="mail" required>

              <h4>Contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña entre 8 y 16 caracteres" name="psw" required>
              <p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>

              <h4>Repite la contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña que coincida" name="psw2"
                required>
            </div>
            <div class="submit-formulario">
              <input type="button" value="INICIAR SESION" class ="boton-formulario2" onclick="location.href='login.php'">
                <input type="submit" name="REGISTRASE" class ="boton-formulario">
            </div>
</body>
</html>
