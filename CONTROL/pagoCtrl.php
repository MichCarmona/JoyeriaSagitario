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
    <link rel="stylesheet" href="../style.css">
</head><!--  -->

<body>

    <!-- INICIO ENCABEZADO -->
    <header id="encabezadoAd">

        <!-- INICIO NAV -->
        <nav id="navAd">
            <section class="admi">
                <a href="administrador.html">Inicio</a>
                <a href="productos.html">Productos</a>
                <a href="Usuarios.html">Usuarios</a>
                <a href="contacto.html">Contacto</a>
                <a href="ordenCtrl.php">Ordenes</a>
                <a href="pagoCtrl.php">Pago</a>
                <a href="index.html">Cerrar sesion</a>


            </section>
        </nav>
    </header>

    <section id="seccionUsuarios">

        <div class="contenedorUsuarios">

            <h1>PAGO</h1>
            <br>
            <br>
            <div class="search-container">
                <div class="search-bar">
                    <form action='pagoCtrl.php' method='post' name='frmConsultar' class='search-form'>
                        <input type='text' name='monto' placeholder='Ingrese un nombre' class='search-input'>
                        <input type='hidden' name='opcion' value='4'>


                        <button type='submit' class='search-button'>Buscar</button>
                    </form>
                    <?php
                    require("../modelo/pago.php");
                    $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : '';

                    $obj = new Pago();
                    $obj->listarPago();

                    echo '<a href="pagoCtrl.php?opcion=1"><input type="submit" value="Crear Orden"></a>';



                    ?>

                    <?php
                    switch ($opcion) {


                        case 1:

                            $obj->mostrarFormulario();




                            break;



                        case 2:

                            $obj->inicializar($_REQUEST['monto']);
                            $obj->agregarPago();

                            //

                            break;

                        case 3:

                            $obj->eliminarPago($_REQUEST['codigo']);
                            break;


                        case 4:


                            $obj->consultarPago($_REQUEST['monto']);

                            break;
                    }

                    $obj->cerrarBD();
                    ?>
                    <h2><a href="../detalle.php">Regresar</a></h2>