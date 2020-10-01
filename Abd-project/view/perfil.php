<!DOCTYPE html>

<html>
    <head>
        
        <link rel="stylesheet" type="text/c ss" href="../css/formulario.css" />
        <title>perfil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <?php 
        session_start();
        include 'layout/head.php';
        include '../config/config.php';
         require_once '../model/pedido.php';
 ?>
    </head>

    <body>
        <?php
	       
        if (!isset($_SESSION["login"])) {
            header("Location: login.php"); 
                                       }                    
      
    ?>
         <?php
             // $pedidos =array();
           echo '<h1>Pedidos de '.$_SESSION['nombre'].'</h1>';
                $pedidos=Pedido::buscaPedidoU($_SESSION['nombre']);
                foreach($pedidos as $pe){
                    $id=$pe->getidPedido();
                    $name=$pe->getidArticulo();
                    $can=$pe->getCantidad();
                    $im=$pe->getImporte();
                    echo '<p>id: '.$id.' id_articulo: '.$name.' cantidad: '.$can.' importe: '.$im.'€ </p>';
                }

                ?>

    </body>
</html>