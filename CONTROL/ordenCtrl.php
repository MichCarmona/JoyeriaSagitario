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
   <!-- <header id="encabezadoAd"> -->

        <!-- INICIO NAV
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
        </nav>  -->


    </header>

    <section id="seccionUsuarios">
        <div class="contenedorUsuarios">
            <!--   <h1>Listado de Ordenes</h1>
            <br>
            <br>-->

            <?php
            require("../MODELO/orden.php");
            $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : '';
            $obj = new Orden();
            

            switch ($opcion) {
                case 1:
                    // Mostrar formulario para crear orden
                    $obj->mostrarFormulario();
                    break;

                case 2:
                    // Procesar inserción de orden
                    $obj->inicializar(
                        $_REQUEST['fecha_orden'],
                        $_REQUEST['fecha_entrega'],
                        $_REQUEST['numero_factura'],
                        $_REQUEST['estatus'],
                        $_REQUEST['total_orden'],
                        $_REQUEST['id_cliente'],
                        $_REQUEST['id_sucursal'],
                        $_REQUEST['id_pago']
                    );
                    $obj->insertarOrden();
                    break;

                case 3:
                    // Procesar actualización o eliminación de orden
                    if (isset($_REQUEST['eliminar'])) {
                        // Si se ha enviado la solicitud de eliminación
                        $obj->editarOrden($_REQUEST['idOrden'], 'Cancelado');
                    } else {
                        // Si se ha enviado la solicitud de actualización
                        // Verifica que se haya seleccionado una opción diferente a "En proceso"
                        if ($_REQUEST['nuevoestatus'] !== 'En proceso') {
                            $obj->editarOrden($_REQUEST['idOrden'], $_REQUEST['nuevoestatus']);
                        } else {
                            echo '<div class="error-message">No se ha seleccionado un nuevo estatus diferente a "En proceso".</div>';
                        }
                    }
                    break;

                // case 4:
                //     // Código para la opción 4
                //     break;

                // case 5:
                //     // Código para la opción 5
                //     break;
            }
        // Mostrar lista de ordenes
        
        $obj->obtenerOrdenesRecientes();
        $obj->listarOrdenes();
        // Mostrar formulario para crear orden
        echo '<a href="ordenCtrl.php?opcion=1"><input type="submit" value="Crear Orden"></a>';
        $obj->cerrarBase();
        ?>

        <h2><a href="../administrador.php">Regresar</a></h2>
    </div>
    </section>

    <!-- Otros elementos HTML y scripts van aquí -->

</body>

</html>
