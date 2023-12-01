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
    </head>

    <body>
        <header class="encabezado">
            <!-- Barra de navegación -->
            <nav class="menu-navegacion">
                <!-- Menú de navegación - Enlaces -->
                <ul class="enlaces">
                    <li><a href="boutiques.html"><span class="boutiques">Boutiques</span></a></li>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="shop.html">Tienda</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="el.html">Caballero</a>
                            <div class="dropdown-content">
                                <a href="collaresHombre.html">Collares</a>
                                <a href="el.html">Anillos</a>
                                <a href="pulserasH.html">Pulseras</a>
                             
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="ella.html">Dama</a>
                            <div class="dropdown-content">
                                <a href="collaresMujer.html">Collares</a>
                                <a href="ella.html">Anillos</a>
                                <a href="pulserasM.html">Pulseras</a>
                               
                            </div>
                        </div>
                    </li>

                    <li><a href="about.html">Acerca de</a></li>
                    <li><a href="login.html"><i class="far fa-user"></i></a></li>
    
                    <!-- Barra de búsqueda -->
                    <li>
                        <div class="buscar">
                            <input type="text" placeholder="Buscar" required>
                            <div class="boton">
                                <img src="img/buscar.svg" alt="">
                            </div>
                        </div>
                    </li>
                    <img class="logo" src="img/joyeria/joyeria/LOGO/c-rem.png" alt=""> <!-- Logo de la empresa -->
                </ul>
            </nav>
            <img class="icono-menu" src="img/hamburguesa.svg" alt=""> <!-- Icono para desplegar el menú -->
        </header>
        
        <!-- SECCION SUCURSALES -->

        <?php 
        
            include("../MODELO/sucursalesModelo.php");

            $suc = new Sucursal();
            $suc->listarSucursales();
            $suc->cerrarBase();
        
        ?>

        <main class="main_boutique">

            <div class="container-tittle">
                <h2>BOUTIQUES Y PUNTOS DE VENTA</h2>
            </div>

            <section class="container-galery">

                <!-- FILA1 -->

                <div class="container-row">
                    <div class="container-column-image">
                        <img src="img/boutique_section/Encuentro-Oceania.png" alt="encuentrooceania">
                    </div>
                    <div class="container-column-direction">
                        <div class="container-name">
                            <h3>ENCUENTRO OCEANIA</h3>
                        </div>
                        <div class="container-direction">
                            <p>
                                Av. del Peñón 355, Moctezuma 2da Secc, Venustiano Carranza, 15530 Ciudad de México, CDMX
                            </p>
                        </div>
                        <div class="contact_horary">
                            <p><b>Teléfonos: </b><a href="#">+52 55 9138 0500</a></p>
                            <p><b>WhatsApp: </b><a href="">+52 55 2498 7847</a></p>
                            <p><b>Correo: </b><br><a href="">joyeriascristal_help@gmail.com</a></p>
                            <p><b>Horarios: </b><br>
                                Lun a Vier: 11am – 7pm <br>
                                Sáb: 11am – 6pm <br>    
                                Dom: Cerrado</p> <br>
                        </div>
                    </div>
                </div>

                <!-- FILA2 -->

                <div class="container-row">

                    <div class="container-column-direction">
                        <div class="container-name">
                            <h3>PLAZA CARSO</h3>
                        </div>
                        <div class="container-direction">
                            <p>
                                C. Lago Zurich 245, Amp Granada, Miguel Hidalgo, 11529 Ciudad de México, CDMX
                            </p>
                        </div>
                        <div class="contact_horary">
                            <p><b>Teléfonos: </b><a href="#">+52 55 5280 9569</a></p>
                            <p><b>WhatsApp: </b><a href="">+52 55 8019 5732</a></p>
                            <p><b>Correo: </b><a href="">joyeriascristal_help@gmail.com</a></p>
                            <p><b>Horarios: </b><br>
                                Lun a Vier: 11am – 7pm <br>
                                Sáb: 11am – 6pm <br>
                                Dom: Cerrado</p> <br>
                        </div>
                    </div>

                    <div class="container-column-image">
                        <img src="img/boutique_section/carso.png" alt="encuentrooceania">
                    </div>

                </div>

                <!-- FILA3 -->

                <div class="container-row">
                    <div class="container-column-image">
                        <img src="img/boutique_section/satelite.png" alt="encuentrooceania">
                    </div>
                    <div class="container-column-direction">
                        <div class="container-name">
                            <h3>PLAZA SATELITE</h3>
                        </div>
                        <div class="container-direction">
                            <p>
                                Cto Centro Comercial 2251, Cd. Satélite, 53100 Naucalpan de Juárez, Méx.
                            </p>
                        </div>
                        <div class="contact_horary">
                            <p><b>Teléfonos: </b><a href="#">+52 55 5280 7959</a></p>
                            <p><b>WhatsApp: </b><a href=""> +52 55 2498 7847</a></p>
                            <p><b>Correo: </b><a href="">joyeriascristal_help@gmail.com</a></p>
                            <p><b>Horarios: </b><br>
                                Lun a Vier: 11am – 7pm <br>
                                Sáb: 11am – 6pm <br>
                                Dom: Cerrado</p> <br>
                        </div>
                    </div>
                </div>

            </section>

        </main>


        <footer class="section-p1">
            <div class="col"> 
                <h4>Contacto</h4>
                <p> <strong> Direccion: </strong> Av. Chimalhuacán 340, 
                    <br>
                    <br> entre Paloma Negra Y Calle Gaviota, 
                    <br>
                    <br> 57000 Nezahualcóyotl, Estado de México</p>
                <p> <strong> Telefono: </strong> 5512345678</p>
                <p> <strong> Horario de atencion: </strong> 8am a 8pm</p>
                <div class="follow">
                    <h4>Síguenos en nuestras redes</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
        
            <div class="col">
                <!-- <h4>Acerca de nosotros</h4> -->
                <a href="#">Acerca de nosotros</a>
                <a href="#">Políticas de privacidad</a>
                <a href="#">Contáctanos</a>
            </div>
        
            <div class="col">
                <!-- <h4>Mi cuenta</h4> -->
                <a href="#">Registrarme</a>
                <a href="#">Compras</a>
                <a href="#">Lista de deseos</a>
                <a href="#">Ayuda</a>
            </div>
        
            <div class="col install">
                <h4>Descargar aplicación</h4>
                <p>App Store o Google Play</p>
                <div class="row">
                    <img src="img/pay/app.jpg" alt="">
                    <img src="img/pay/play.jpg" alt="">
                </div>
                <p>Pagos seguros</p>
                <img src="img/pay/pay.png" alt="">
            </div>
        
            <div class="copyright">
                <p>2023, BOOSTAPPS equipo de desarrollo - ECOMMERCE SITIO APLICACIONES WEB</p>
            </div>
        </footer>    
        <script src="script.js"></script>
    </body>
</html>


