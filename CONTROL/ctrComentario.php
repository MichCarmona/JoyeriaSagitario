<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://cdn.jsdelivr.net/alertifyjs/1.0.10/dist/js/alertify.js"></script>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joyería Sagitario</title>
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
        <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../JoyeriaSagitario/css/style.css">
    </head><!--  -->
    <body>
        <header class="encabezado">
            <!-- Barra de navegación -->
            <nav class="menu-navegacion">
                <!-- Menú de navegación - Enlaces -->
                <ul class="enlaces">
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
<?php
    include('../MODELO/Comentario.php');
    $com=new Comentario();
    switch($_REQUEST['opcion']){
        // case 1:
        //     $com->inicializar($_REQUEST['mensaje'],$_REQUEST['mail'], $_REQUEST['tipom']);
        //     $com->ingresarMensaje();
        // break;
        case 2: 
            $com->consultarMensaje($_REQUEST['mensaje']);
        break;
        case 3:
            $com->listarMensaje();
        break;
        case 5:
            $com->borrarMensaje($_REQUEST['codigo']);
        break;
        case 6:
            $com->impIndex();
        break;
        case 7:
            $com->impPanel();
        break;
        
        default:
        $com->listarMensaje();
            break;

    }
?>


<section id="banner3">
            <div class="banner-box">
                <h2>Consigue</h2>
                <h3></h3>
            </div>

            <div class="banner-box banner-box2">
                <h2>Lo mejor</h2>
                <h3></h3>
            </div>

            <div class="banner-box banner-box3">
                <h2>Para ti</h2>
                <h3></h3>
            </div>
        </section>

        <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>Registrate para conocer más promociones.</h4>
                <br>
              <h6>Productos nuevos cada mes.</h6>
                </p>
            </div>
         

        <footer class="section-p1">
            <div class="col">
                <h4>Contacto</h4>
                <p> <strong> Direccion: </strong> Av. Chimalhuacán 340,
                    <br>
                    <br> entre Paloma Negra Y Calle Gaviota,
                    <br>
                    <br> 57000 Nezahualcóyotl, Estado de México
                </p>
                <p> <strong> Telefono: </strong> 5512345678</p>
                <p> <strong> Horario de atencion: </strong> L-V 8:00 a 20:00 hrs.</p>
                <p> <strong>Festivos de: </strong> 12:00 a 17:00 hrs.</p>
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
                <a href="about.html">Acerca de nosotros</a>
                <a href="politics.html">Políticas de privacidad</a>
                <a href="contactus.html">Contáctanos</a>
                <a href="#">Ayuda</a>
                <section class="logoF">
                    <br>
                    <img class="logoF" src="img/joyeria/joyeria/LOGO/c-rem.png" alt="">
                </section>
            </div>
    
            <div class="col">
                <!-- <h4>Mi cuenta</h4> -->
                <a href="login.html">Registrarme</a>
                <a href="#">Compras</a>
                <a href="#">Lista de deseos</a> <br>
            </div>
    
            <div class="copyright">
                <p>2023, BOOSTAPPS equipo de desarrollo - ECOMMERCE SITIO APLICACIONES WEB</p>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
