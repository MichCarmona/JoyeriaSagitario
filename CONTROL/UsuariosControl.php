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

                <a href="administrador.html">Inicio</a>
                <a href="Ordenes.html">Ordenes</a>
                <a href="sucursales.html">Sucursales</a>
                <a href="pagos.html">Pagos</a>
                <a href="productos.html">Productos</a>
                <a href="categorias.html">Categorias</a>
                <a href="contacto.html">Contacto</a>
                <a href="index.html">Cerrar sesion</a>
        
            </nav>

        </header>

        <section id="seccionUsuarios">

            <div class="contenedorUsuarios">

                <h1>USUARIOS</h1><br>

                <?php 

                    include("../Modelo/UsuariosModelo.php");

                    $accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : ' ';

                    ?>

                        <form action="../control/UsuariosControl.php?accion=consultar" method="post">
                        
                            <h3>Buscar usuario</h3>
                            <input type="email" name="mail" placeholder="mail">
                            <input type="submit" value="Buscar">

                        </form>

                    <?php

                    $alum1 = new Usuario();

                    $alum1->listarUsuarios();

              

                    if($accion==' '){

                        echo "<a href = '../VISTA/Index.html'> regresar <br></a>";

                    }else{
                        
                    }

                    switch($accion){

                        case 'mostrarFormulario':
                            $alum1->mostrarFormulario();
                            break;

                        case 'agregar': 
                            $alum1->ingresarAlumnos($_REQUEST['nombre'], $_REQUEST['mail'], $_REQUEST['codigocurso']);
                            break;

                        case 'consultar':
                            $alum1->consultarAlumno($_REQUEST['mail']);
                            break;

                        case 'borrar':
                            $alum1->borrarUsuario($_REQUEST['codigo']); 
                            break;

                        case 'modificar':
                            $alum1->modificarAlumno($_REQUEST['mail']);
                            break;

                        case 'actualizar':
                            $alum1->actualizarAlumno($_REQUEST['nombrenuevo'], $_REQUEST['mailnuevo'], $_REQUEST['codigocursonuevo'], $_REQUEST['mailviejo']);
                            break;

                    }

                    $usu->cerrarBase(); 


                    ?>

            </div>


        </section>

        <script src="script.js"></script>
    </body>
</html>


