<?php

require_once 'Orden.php';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaOrden = $_POST["fecha_orden"];
    $fechaEntrega = $_POST["fecha_entrega"];
    $estatus = $_POST["estatus"];
    $totalOrden = $_POST["total_orden"];

    // Crear una instancia de la clase Orden
    $orden = new Orden();

    // Llamar al método insertarOrden para insertar la nueva orden
    $orden->insertarOrden($fechaOrden, $fechaEntrega, $estatus, $totalOrden);

    // Redirigir o mostrar un mensaje de éxito
    header("Location: exito.php");
    exit();
}

?>
