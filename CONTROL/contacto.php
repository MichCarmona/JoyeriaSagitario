<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joyería Sagitario</title>
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
        <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../vista/style.css">
    </head><!--  -->
    
    <body>

        <!-- INICIO ENCABEZADO -->
        <header id="encabezadoAd">

            <!-- INICIO NAV -->
            <nav id="navAd">

                <a href="./html/administrador.html">Inicio</a>
                <a href="./html/sucursales.html">Sucursales</a>
                <a href="./html/productos.html">Productos</a>
                <a href="./html/categoria.html">Categorias</a>
                <a href="./html/Usuarios.html">Usuarios</a>
                <a href="../control/contacto.php">Contacto</a>
                <a href="./html/Ordenes.html">Ordenes</a>  
                <a href="index.html">Cerrar sesion</a>  
        
            </nav>

        </header>

        <section id="seccionUsuarios">

            <div class="contenedorUsuarios">

                <h1>CONTACTO</h1>
                <?php
            include('../Modelo/Comentario.php');
            $com=new Comentario();
            $com->listarMensaje();

            if (isset($_REQUEST['opcion'])) {   
            switch($_REQUEST['opcion']){
                // case 1:
                //     $com->inicializar($_REQUEST['mensaje'],$_REQUEST['mail'], $_REQUEST['tipom']);
                //     $com->ingresarMensaje();
                // break;

                case 5:
                    $com->borrarMensaje($_REQUEST['codigo']);
                break;
         
                }
            }
                    ?>
            </div>


        </section>

        <script src="script.js"></script>
    </body>
</html>
