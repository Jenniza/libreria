<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="stylesheet" type="text/css" href="../css/head.css" />

<script type="text/javascript" src="../js/utilidea.js"></script>
</head>
<body>
    <?php if(!isset($_SESSION)) { session_start(); } ?>
    <!--header es el contenedor principal -->
    <header id="container">
        <div class="wrapper">
            <!--El logo de la pagina que la pinchar lleva a la pagina principal -->
            <label class=login> <a href="../index.php">inicio</a> </label>

            <!--esta caja permite al usuario hacer login, registrarse o cerrar sesion. -->
            <div id="derecha">
                <?php
                    if (isset($_SESSION["login"])){
                        echo"<label class="."sesion"."> Bienvenido, <a href='../view/perfil.php'>  {$_SESSION['nombre']}</a></label>";
                        
                        echo"<label class="."sesion2"."><a href='../view/logout.php'> Cerrar Sesion</a></label>";


                    }else{
                        //echo"<li><a href="."../views/login.php".">SignUp"."</a></li>";
                        echo "<label class="."sesion"."><a href='../view/login.php'>Login</a> / <a href='../view/signup.php'>Registro</a></li>";
                    }
                ?>
            </div>
        </div>
    </header>

</body>

</html>
