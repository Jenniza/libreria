<?php
include '../config/config.php';

//Doble seguridad: unset + destroy
unset($_SESSION["login"]);
unset($_SESSION["esAdmin"]);
unset($_SESSION["nombre"]);


session_destroy();
?><!DOCTYPE html>
<html>
<head>
     <?php include 'layout/head.php'; ?>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Portada</title>
</head>

<body>

<div id="contenedor">

	<div id="contenido">
		<h1>Hasta pronto!</h1>
        <?php
          header('Refresh: 5; URL=http://localhost/libreria-master/Abd-project/index.php');
        ?>
	</div>



</div>

</body>
</html>