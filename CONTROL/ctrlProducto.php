

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
    <script src="https://kit.fontawesome.com/695a7fc4ef.js" crossorigin="anonymous"></script>
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

<?php 
include "../modelo/modeloProduct.php";

$prod = new Producto();
$prod -> conectarDB();

switch($_REQUEST['opcion']){
    case "1":
        $prod ->inicializar($_REQUEST['nombreProd'],$_REQUEST['descripcionProd'],$_REQUEST['cantidadExistente'],$_REQUEST['precioVenta'],$_REQUEST['precioCompra'],$_REQUEST['idCategoria'],);
        $prod -> registrarProducto();
        break;

    case "2":
        $prod -> modificarProductos($_REQUEST['nombreProd']);
        break;
        
    case "3":
        $prod -> eliminarProducto($_REQUEST['idProd']);
        break;
        
    case "4":
        $prod -> actualizarProducto($_REQUEST['idProd'],$_REQUEST['nombreProdNuevo'],$_REQUEST['descNueva'],$_REQUEST['cantidadExistenteNueva'],$_REQUEST['precioVentaNuevo'],$_REQUEST['precioCompraNuevo'],$_REQUEST['idCategoriaNueva'],$_REQUEST['nombreProdViejo']);
        break;    

}



?>