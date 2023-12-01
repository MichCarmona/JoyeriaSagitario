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
            <section class="admi">
                <a href="administrador.html">Inicio</a>
                <a href="productos.html">Productos</a>
                <a href="Usuarios.html">Usuarios</a>
                <a href="contacto.html">Contacto</a>
                <a href="ordenes.html">Ordenes</a>
                <a href="pago.html">Pago</a>
                <a href="index.html">Cerrar sesion</a>


            </section>
        </nav>


    </header>

    <section id="seccionUsuarios">

        <div class="contenedorUsuarios">

            <h1 style="color:black;">Detalle Orden</h1>
            <br>
            <br>
            <?php
switch ($_REQUEST["opcion"]){
    case 22: 
        echo '<h2><a href="../html/detalle.php">Regresar</a></h2>';
        include ("../modelo/detalleOrden.php");
$obj=new Detalle();
$obj->borrar();

break;
case 11:
    echo '<h2><a href="../index.php">Regresar</a></h2>';
    include ("../modelo/detalleOrden.php");
    $obj=new Detalle();
    $obj->Producto();
    break;
    case 33:
        echo '<h2><a href="../index.php">Regresar</a></h2>';
        include ("../modelo/detalleOrden.php");
        $obj=new Detalle();
        $obj->Orden();
        break;


}
            ?>
            