<!DOCTYPE html>
<html>
<head>
	<?php
    if(!isset($_SESSION)){
	   session_start();
    }
    require_once "model/pelicula.php";
    require_once "model/bd_mongo/libro.php";
    require_once "model/bd_mongo/musica.php";
    require_once 'config/config.php';
    
	?>

    </head>
<body>
    <div id="contenedor">
        <!--font contiene la parte principal donde se muestra una foto de un paisaje. -->
        <div id="front">
            <!--login contiene lo que correponde a la parte login y registro. cuando un usario esta registrado, muestra su nombre. -->
            <div class="login">
                <?php
                if (isset($_SESSION["login"])) {
                  echo '<a class="reg" href="./view/logout.php">Cerrar Sesion</a>';  
                  echo"<label class="."sesion"."> Bienvenido <a href='./view/perfil.php'> {$_SESSION['nombre']}</a></label>";
            } 
            else{
                    echo '<a class="reg" href="./view/login.php">Iniciar Sesion</a>';
            }
                ?>
            </div>




            <!--<script class="search" src="aqui va el script de busqueda."></script> -->
        </div>
        <!--Esta parte muestra los 3 eventos más proximos -->
      <?php
        
        echo '<label class="art">';
         echo'<h1 id="title">Peliculas</h1>';
         
        
       
        
            
            $num=13;
            $i = 7;
            while($i <$num){
               echo '<label class="gallery">';
                $peli = Pelicula::buscaPeliID($i);
                $name=$peli->getNombre();
                $ima=$peli->getIma();
                $id=$peli->getid_articulo();
                $impo=$peli->getImporte();
                $tipo="peli";
                echo '<p>'.$name.'</p>';
                echo '<label class="imge"><img src= '.$ima.' alt="imagen de '.$name.'" width="100" height="100"></label>';
                $i++; 
                echo '<label class="desc"><input type="button"  class="button" value="añadir a carrito" id="boton" onclick="location.href=\'./controller/FormularioCarrito.php?idP='.$id.'&impor='.$impo.'&tipo='.$tipo.'\'"></label>';
               echo '</label>';
            }
        echo '</label>';
        echo '<label class="art">';
        echo '<label class="title"><h1>Libros</h1></label>';
        
            $num=6;
            $i = 1;
            while($i <$num){
                echo '<label class="gallery">';
                $libro = Libro::buscaLibroId($i);
                $name=$libro->getNombre();
                $ima='./view/imagen';;
                $id=$libro->getIdar();
                $impo=$libro->getImporte();
                $tipo="libro";
                echo '<p>'.$name.'</p>';
                echo '<label class="imge"><img src= '.$ima.' alt="imagen de '.$name.'" width="100" height="100"></label>';
                $i++; 
                echo '<label class="desc"><input type="button"  class="button" value="añadir a carrito" id="boton" onclick="location.href=\'./controller/FormularioCarrito.php?idP='.$id.'&impor='.$impo.'&tipo='.$tipo.'\'"></label>';
               echo '</label>';
            }
        echo '</label>';
        echo '<label class="art">';
        echo' <h1 id="title"> Musica</h1>';
            $num=6;
            $i = 1;
            while($i <$num){
                echo '<label class="gallery">';
                $mus = Musica::buscaMusicaId($i);
                $name=$mus->getNombre();
                $ima='./view/imagen';
                $id=$mus->getIdar();
                $impo=$mus->getImporte();
                $tipo="libro";
                echo '<p>'.$name.'</p>';
                echo '<label class="imge"><img src= '.$ima.' alt="imagen de '.$name.'" width="100" height="100"></label>';
                $i++; 
                echo '<label class="desc"><input type="button"  class="button" value="añadir a carrito" id="boton" onclick="location.href=\'./controller/FormularioCarrito.php?idP='.$id.'&impor='.$impo.'&tipo='.$tipo.'\'"></label>';
               echo '</label>';
            }
        echo '</label>';
            ?>
    
    </div> <!-- Fin del contenedor -->
</body>
    </html>