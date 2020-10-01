<?php
include '../model/pedido.php';
include '../model/pelicula.php';
include '../config/config.php';
if (! isset($_SESSION["login"]) ) {
	header('Location: ../view/login.php');
	exit();
}


$erroresFormulario = array();
$id=$_GET['idP'];
$nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
$impo=$_GET['impor'];
$tipo=$_GET['tipo'];
$idP= Pedido::buscaNumeroFilas()+1;
if($tipo=='peli'){
    $peli=Pelicula::buscaPeliID($id);
    $cantidad=$peli->getCantidad();
    $cantidad=$cantidad-1;
    $peli->setCantidad($cantidad);
    $peli->actualiza($peli);
}
if($tipo=='libro'){
    $libro=Libro::buscaLibroId($id);
    $cantidad=$libro->getCantidad();
    $cantidad=$cantidad-1;
    $libro->setCantidad($cantidad);
}


$pedido = Pedido::crea($idP,$nombreUsuario, $id, $impo, 1);
 if (! $pedido ) {
            $erroresFormulario[] = "El usuario ya existe";
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
		
            if (count($erroresFormulario) > 0) {
                echo '<ul class="errores">';
                 header('Refresh: 5; URL=http://localhost/libreria-master/Abd-project/index.php');
            }
            else{
                echo "<h1>pedido añadido </h1>";
                header('Refresh: 5; URL=http://localhost/libreria-master/Abd-project/index.php');
            }
?>
		

	</div>




</div>

</body>
</html>