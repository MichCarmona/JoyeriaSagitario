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
        <header class="encabezado">
            <!-- Barra de navegación -->
            <nav class="menu-navegacion">
                <!-- Menú de navegación - Enlaces -->
                <ul class="enlaces">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="shopControl.php">Tienda</a></li>
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
                                <img src="../img/buscar.svg" alt="">
                            </div>
                        </div>
                    </li>
                    <img class="logo" src=" ../img/joyeria/joyeria/LOGO/c-rem.png" alt=""> <!-- Logo de la empresa -->
                </ul>
            </nav>
            <img class="icono-menu" src="../img/hamburguesa.svg" alt=""> <!-- Icono para desplegar el menú -->
        </header>

        <?php 
        
            include("../MODELO/loginModelo.php");

            $accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : ' ';
        
        ?>

            <!-- Formularios -->
            
            <div class="bof">

                    <form action="loginControl.php?accion=ingresar" method="post" class="form">

                        <h2 class="form__h2">Iniciar Sesion</h2>
                        <input class="form__input" name="mail" type="email" placeholder="Correo" required>
                        <input class="form__input" name="contraseña" type="password" placeholder="Contraseña" required>
                        <input id="btn__iniciarSesion" type="submit"  value="INICIAR SESION"><br>
                        <p class="form__p">¿Aun no tienes cuenta? <a href="formRegister.html" class="form_enlaceR">Registrate aqui</a></p>
                        <p class="form__p"> <a href="formAdmin.html" class="form_enlaceR">Inicia sesion</a> como administrador</p>

                    </form>
                
            </div>

        <?php

            $cli1 = new Cliente();
            // $cli1->registrarCliente();  

            switch($accion){

                        case 'ingresar':
                            $usu1->consultarUsuario($_REQUEST['mail']);
                            break;

            }

        ?>

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
            <section class="logoF">
                <br>
                <img class="logoF" src="../img/joyeria/joyeria/LOGO/c-rem.png" alt="">
            </section>
        </div>

        <div class="col">
            <!-- <h4>Mi cuenta</h4> -->
            <a href="login.html">Registrarme</a>
            <a href="#">Compras</a>
            <a href="#">Lista de deseos</a>
            <a href="#">Ayuda</a>
        </div>

        <div class="copyright">
            <p>2023, BOOSTAPPS equipo de desarrollo - ECOMMERCE SITIO APLICACIONES WEB</p>
        </div>
    </footer>
    <script src="script.js"></script>
    <script>
        $(document).ready(function () {
            $('.nav-tabs a').on('shown.bs.tab', function (event) {
                var target = $(event.target).attr("href");
                if (target === "#registrarse") {
                    // Mostrar el formulario de registro
                } else if (target === "#iniciar-sesion") {
                    // Mostrar el formulario de inicio de sesión
                }
            });
        });
    </script>

</body>

</html>