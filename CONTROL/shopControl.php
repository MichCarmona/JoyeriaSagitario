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

    <body class="body-shop">

        <header class="encabezado">
            <!-- Barra de navegación -->
            <nav class="menu-navegacion">
                <!-- Menú de navegación - Enlaces -->
                <ul class="enlaces">
                    <li><a href="sucursalesControl.php"><span class="boutiques">Sucursales</span></a></li>
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
                    <li><a href="loginControl.php"><i class="far fa-user"></i></a></li>
    
                    <!-- Barra de búsqueda -->
                    <li>
                        <div class="buscar">
                            <input type="text" placeholder="Buscar" required>
                            <div class="boton">
                                <img src="../../img/buscar.svg" alt="">
                            </div>
                        </div>
                    </li>
                    <img class="logo" src="../../img/joyeria/joyeria/LOGO/c-rem.png" alt="">
                </ul>
            </nav>
            <img class="icono-menu" src="../../img/hamburguesa.svg" alt=""> <!-- Icono para desplegar el menú -->
        </header>
        <script src="script.js"></script>

        <main class="main_shop_section">

            <section class="leyend">
                <h1>
                    Enciende tus sueños
                </h1>
                <p>
                    Desde 1998, nuestra pasion por la innovación y el diseño, y 
                    el dominio del corte de cristal, ha definido a Joyeria Sagitario como la marca líder de joyería y 
                    accesorios.
                </p>
            </section>

            <h2 class="subtitulo">Obtén el brillo dorado</h2>

            <!-- CATERGORIAS -->

            <?php
            
                include("../MODELO/shopModelo.php");

                $accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : ' ';

                $shop1 = new Tienda(); 

                $shop1->listarCategorias();

            ?>

            <!-- VIDEO -->

            <section>
                <div class="video">
                    <video src="../img/shop_section/y2meta.com-Swarovski _ Crystal Metamorphosis-(1080p).mp4" 
                    width="1345" height="" muted autoplay loop poster="img/shop_section/aretes4.png"></video>
                </div>
            </section>

            <!-- GALERIA PRODUCTOS -->

            <?php 
            
                $shop1->listarProductos();

                $shop1->cerrarBase();

            ?>

            <!-- contenedor de cuadros de imagenes -->
            <!-- <section id="product1" class="section-p1"> 
                <div class="pro-container">
                    <div class="pro">
                    <br><br><br><br><br>
                        <a href="JakcetMesmera.html"><img  src="../img/shop_section/mesmera1.png" alt="aretepluma"></a>
                        <div class="des">
                            <br><br><br><br><br>
                            <span>Baño de rodioda</span>
                            <h5>Pendientes ear jacket Mesmera </h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>$2,350</h4>
                        </div>
                    </div>
        
                    <div class="pro">
                        <br><br><br><br><br><br>
                            <a href="BotonNice.html"><img src="../../img/shop_section/arete pluma.png" alt="aretepluma"></a>
                        <div class="des">
                            <br><br><br><br>
                            <span>Baño tono oro rosa</span>
                            <h5>Pendientes de botón Nice</h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>$2,550</h4>
                        </div>
                    </div>
                
            
                    <div class="pro">
                        <br><br><br><br><br><br><br>
                        <a href="PulseraMesemra.html"><img src="../../img/shop_section/pulsera-mesmera.png" alt="aretepluma"></a>
                        <div class="des">
                        <br><br><br><br>
                            <span>Baño de rodio</span>
                            <h5>Pulsera Mesemra</h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>$2,350</h4>
                        </div>
                        </div>

    

                
                        <div class="pro">
                        <br><br><br><br><br>
                        <a href="PendienteCuff.html"><img src="../../img/shop_section/pendiente_dextera.png" alt="aretepluma"></a>
                        <div class="des">
                                <br><br><br><br><br>
                            <span>Baño tono oro</span>
                                <h5>Pendiente ear cuff Dextera</h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4>$1,950</h4>
                            </div>
                        </div>
            
                        <div class="pro">
                            <br><br><br><br><br><br>
                            <a href="ColganteNice.html"><img src="../../img/shop_section/colgante_pluma.png" alt="colgantepluma"></a>
                            <div class="des">
                                <br><br><br><br><br><br><br><br>
                                <span>Baño tono oro rosa</span>
                                <h5>Colgante Nice </h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4>$3,450</h4>
                            </div>
                        </div>
                        
                
                        <div class="pro">
                        <br><br><br><br><br><br>
                        <a href="ColganteLuna.html"><img src="../../img/shop_section/brazalete_luna_multicolor.png" alt="aretepluma"></a>
                        <div class="des">
                                <br><br><br><br><br><br><br><br><br>
                            <span>Baño tono oro rosa</span>
                                <h5>Colgante Luna</h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4>$3,450</h4>
                            </div>
                        </div>
                </div>
            </section> -->

        </main>

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
                    <img class="logoF" src="../../img/joyeria/joyeria/LOGO/c-rem.png" alt="">
                </section>
            </div>

            <div class="col">
                <!-- <h4>Mi cuenta</h4> -->
                <a href="login.html">Registrarme</a>
                <a href="#">Compras</a>
                <a href="#">Lista de deseos</a> <br>
                <section class="footertext">
                    <p class="comentariosp">Por favor, dejenos sus comentarios!</p>
                    <p>¿Como le parecieron nuestros servicios? </p>
                    <select name="comentarios">
                        <option value="Felicitacion">Felicitaciones</option>
                        <option value="Sugerencia">Sugerencia</option>
                        <option value="Inconformidad">Inconformidad</option>
                        </select>
                        <div>
                            <br>
                        <p>Cuentanos tu experiencia!</p>
                        <textarea placeholder="Escribe aqui!"></textarea><br>
                        <input type="button" value="Enviar"name="Enviar">
                        </div>
                </section>
            </div>

            <div class="copyright">
                <p>2023, BOOSTAPPS equipo de desarrollo - ECOMMERCE SITIO APLICACIONES WEB</p>
            </div>
        </footer>
            <script src="script.js"></script>
    </body>
</html>
