<?php 

    class Sucursal{


        public function conectarBase(){

            $con = mysqli_connect("localhost","root","", "joyeriasagitario")
            or
            die ("Problemas con la conexion");

            return $con;

        }

        public function listarSucursales(){

            $consulta = mysqli_query($this->conectarBase(), "SELECT * FROM sucursal")
            or
            die ("Problemas en la consulta de sucursales"). mysqli_error($this->conectarBase());

            if ($reg = mysqli_fetch_array($consulta)){

                ?>

                <main class="main_boutique">

                    <div class="container-tittle">
                        <h2>BOUTIQUES Y PUNTOS DE VENTA</h2>
                    </div>

                    <section class="container-galery">

                        <!-- FILA1 -->

                        <div class="container-row">
                            <div class="container-column-image">
                                <img src="../img/boutique_section/Encuentro-Oceania.png" alt="encuentrooceania">
                            </div>
                            <div class="container-column-direction">
                                <div class="container-name">
                                    <h3> <?php echo $reg[1] ?> </h3>
                                </div>
                                <div class="container-direction">
                                    <p>
                                        <?php echo $reg[5] . ", " . $reg[4] . ", ". $reg[3] . " " . $reg[2] ?>S
                                    </p>
                                </div>
                                <div class="contact_horary">
                                    <p><b>Teléfono: </b><a href="#"> <?php echo $reg[6] ?> </a></p>
                                    <p><b>WhatsApp: </b><a href="">+52 55 2498 7847</a></p>
                                    <p><b>Correo: </b><br><a href=""><?php echo $reg[7] ?> </a></p>
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

                <?php

            }

        }

        public function cerrarBase(){

            mysqli_close($this->conectarBase());

        }

    }


?>