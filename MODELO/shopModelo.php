<?php 

    class Tienda{

        public function conectarBase(){

            $con = mysqli_connect("localhost","root","", "joyeriasagitario")
            or
            die ("Problemas con la conexion");

            return $con;

        }
        
        public function listarCategorias(){

            $consulta = mysqli_query($this->conectarBase(), "SELECT * FROM categoria")
            or
            die ("Problemas con la consulta de categorias");

            if ($reg = mysqli_fetch_array($consulta)){

                ?>

                <link rel="stylesheet" href="../style.css">
                <section class="category">

                    <!-- CATEGORIAS MUJER -->

                    <div class="fila">
                        <div class="columnCategory">
                                <a href="aretes_mujer_seccion.html"><img src="../img/shop_section/aretes1.png" alt=""></a>
                                <h3> <?php echo $reg[1] ?> </h3>
                                <p>
                                    <?php echo $reg[2] ?>
                                </p>
                                    <a class="buyBotton" href="aretes_mujer_seccion.html">Comprar aretes</a> 
                        </div>

                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>

                        <div class="columnCategory">
                                <a href="pulseras_mujer_seccion.html"><img src="../img/shop_section/pulseras1.png" alt=""></a>
                                <h3> <?php echo $reg[1] ?> </h3>
                                <p>
                                    <?php echo $reg[2] ?>
                                </p>
                                    <a class="buyBotton" href="pulseras_mujer_seccion.html">Comprar pulseras</a> 
                        </div>
                    </div>
                
                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>

                    <div class="fila">
                        <div class="columnCategory">
                                <a href="collares_mujer_seccion.html"><img src="../img/shop_section/collares1.png" alt=""></a>
                                <h3> <?php echo $reg[1] ?> </h3>
                                <p>
                                    <?php echo $reg[2] ?>
                                </p>
                                    <a class="buyBotton" href="collares_mujer_seccion.html">Comprar collares</a> 
                        </div>
                    
                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>

                        <div class="columnCategory">
                                <a href="anillos_mujer_seccion.html"><img src="../img/shop_section/anillo2.png" alt=""></a>
                                <h3><?php echo $reg[1] ?></h3>
                                <p>
                                    <?php echo $reg[2] ?>
                                </p>
                                    <a class="buyBotton" href="anillos_mujer_seccion.html">Comprar anillos</a> 
                        </div>
                    </div>

                <?php 

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>

                    <!-- CATEGORIAS HOMBRE -->

                    <div class="fila">
                        <div class="columnCategory">
                                <a href="arracadas_hombre_seccion.html"><img src="../img/shop_section/arracadas2.jpg" alt=""></a>
                                <h3><?php echo $reg[1] ?></h3>
                                <p>
                                    <?php echo $reg[2] ?>   
                                </p>
                                    <a class="buyBotton" href="arracadas_hombre_seccion.html">Comprar arracadas</a> 
                        </div>

                <?php 
                
            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>
                        <div class="columnCategory">
                                <a href="relojes_hombre_seccion.html"><img src="../img/shop_section/relojes.jpg" alt=""></a>
                                <h3><?php echo $reg[1] ?></h3>
                                <p>
                                    <?php echo $reg[2] ?>
                                </p>
                                    <a class="buyBotton" href="relojes_hombre_seccion.html">Comprar relojes</a> 
                        </div>
                    </div>

                <?php

            }
                
            if ($reg = mysqli_fetch_array($consulta)){

                ?>

                    <div class="fila">
                        <div class="columnCategory">
                                <a href="collares_hombre_seccion.html"><img src="../img/shop_section/collares.jpg" alt=""></a>
                                <h3><?php echo $reg[1] ?></h3>
                                <p>
                                    <?php echo $reg[2] ?>
                                </p>
                                    <a class="buyBotton" href="collares_hombre_seccion.html">Comprar collares</a> 
                        </div>

                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>
                        <div class="columnCategory">
                                <a href="anillos_hombre_seccion.html"><img src="../img/shop_section/anillos.jpg" alt=""></a>
                                <h3><?php echo $reg[1] ?></h3>
                                <p>
                                    <?php echo $reg[2] ?>
                                </p>
                                    <a class="buyBotton" href="anillos_hombre_seccion.html">Compra anillos</a> 
                        </div>
                    </div>

                </section>
                
                <?php
            }
        }

        public function listarProductos(){

            $consulta = mysqli_query($this->conectarBase(), "SELECT * FROM producto")
            or
            die ("Problemas con la consulta de productos". mysqli_error($this->conectarBase()));

            if ($reg = mysqli_fetch_array($consulta)){

                ?>  

                <section id="product1" class="section-p1"> <!-- contenedor de cuadros de imagenes -->
                    <div class="pro-container">
                        <div class="pro"> 
                            <br><br><br><br><br>
                            <a href="JakcetMesmera.html"><img  src="../img/shop_section/mesmera1.png" alt="aretepluma"></a>
                            <div class="des">
                                <br><br><br><br><br>
                                <span> <?php echo $reg[2] ?> </span>
                                <h5> <?php echo $reg[1] ?> </h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4> <?php echo $reg[6] ?> </h4>
                            </div>
                        </div>

                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>  

                        <div class="pro"> 
                            <br><br><br><br><br>
                            <a href="JakcetMesmera.html"><img  src="../img/shop_section/mesmera1.png" alt="aretepluma"></a>
                            <div class="des">
                                <br><br><br><br><br>
                                <span> <?php echo $reg[2] ?> </span>
                                <h5> <?php echo $reg[1] ?> </h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4> <?php echo $reg[6] ?> </h4>
                            </div>
                        </div>

                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>  
                
                        <div class="pro"> 
                            <br><br><br><br><br>
                            <a href="JakcetMesmera.html"><img  src="../img/shop_section/mesmera1.png" alt="aretepluma"></a>
                            <div class="des">
                                <br><br><br><br><br>
                                <span> <?php echo $reg[2] ?> </span>
                                <h5> <?php echo $reg[1] ?> </h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4> <?php echo $reg[6] ?> </h4>
                            </div>
                        </div>

                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>  
                
                        <div class="pro"> 
                            <br><br><br><br><br>
                            <a href="JakcetMesmera.html"><img  src="../img/shop_section/mesmera1.png" alt="aretepluma"></a>
                            <div class="des">
                                <br><br><br><br><br>
                                <span> <?php echo $reg[2] ?> </span>
                                <h5> <?php echo $reg[1] ?> </h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4> <?php echo $reg[6] ?> </h4>
                            </div>
                        </div>

                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>  
                
                        <div class="pro"> 
                            <br><br><br><br><br>
                            <a href="JakcetMesmera.html"><img  src="../img/shop_section/mesmera1.png" alt="aretepluma"></a>
                            <div class="des">
                                <br><br><br><br><br>
                                <span> <?php echo $reg[2] ?> </span>
                                <h5> <?php echo $reg[1] ?> </h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4> <?php echo $reg[6] ?> </h4>
                            </div>
                        </div>

                <?php

            }

            if ($reg = mysqli_fetch_array($consulta)){

                ?>  
                
                        <div class="pro"> 
                            <br><br><br><br><br>
                            <a href="JakcetMesmera.html"><img  src="../img/shop_section/mesmera1.png" alt="aretepluma"></a>
                            <div class="des">
                                <br><br><br><br><br>
                                <span> <?php echo $reg[2] ?> </span>
                                <h5> <?php echo $reg[1] ?> </h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4> <?php echo $reg[6] ?> </h4>
                            </div>
                        </div>
                    </div>
                </section>

                <?php

            }

        }

        public function cerrarBase(){

            mysqli_close($this->conectarBase());

        }


    }

?>