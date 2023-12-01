<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyería Sagitario</title>
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head><!--  -->

<body>
    <!-- INICIO ENCABEZADO -->
    <header id="encabezadoAd">
        <nav id="navAd">
            <section class="admi">
                <a href="ADMIN/CONTROL/UsuariosControl.php">Usuarios</a>
                <a href="Ordenes.html">Ordenes</a>
                <a href="sucursales.html">Sucursales</a>
                <a href="pagos.html">Pagos</a>
                <a href="productos.html">Productos</a>
                <a href="categorias.html">Categorias</a>
                <a href="contacto.html">Contacto</a>
                <a href="index.html">Cerrar sesion</a>
            </section>
        </nav>
    </header>
    <!-- ======================= Cards ================== -->

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Realiza las operaciones de autenticación o redirección aquí
    // En este ejemplo, simplemente mostramos los valores recuperados
    echo "Correo: " . $correo . "<br>";
    echo "Contraseña: " . $contrasena . "<br>";
}
?>


    <div class="cardBoxa">
        <div class="carda">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Visitas diarias</div>
            </div>

            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="carda">
            <div>
                <div class="numbers">80</div>
                <div class="cardName">Ventas</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cart-outline"></ion-icon>
            </div>
        </div>

        <div class="carda">
            <div>
                <div class="numbers">284</div>
                <div class="cardName">Commentarios</div>
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
        </div>

        <div class="carda">
            <div>
                <div class="numbers">$7,842</div>
                <div class="cardName">Ganancias</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Pedidos Recientes</h2>
                <br><br>
                <a href="ADMIN/CONTROL/ordenCtrl.php" class="btn">Ver todo</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>IDorden</th>
                        <th>FechaOrden</th>
                        <th>FechaEntrega</th>
                        <th>TotalOrden</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                    require("ADMIN/MODELO/orden.php");
                    $obj = new Orden();
                    $ordenesRecientes = $obj->obtenerOrdenesRecientes();
                    
                    if (!empty($ordenesRecientes)) {
                        foreach ($ordenesRecientes as $orden) {
                            echo '<tr>';
                            echo '<td>' . $orden['idOrden'] . '</td>';
                            echo '<td>' . $orden['fechOrden'] . '</td>';
                            echo '<td>' . $orden['fechaEntrega'] . '</td>';
                            echo '<td>' . $orden['totalOrden'] . '</td>';
                            echo '<td>' . $orden['estatus'] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">No hay órdenes recientes.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>