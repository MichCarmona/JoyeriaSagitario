<?php

    class Cliente{

        public function conectarBase(){

            $con = mysqli_connect("localhost","root","", "joyeriasagitario")
            or
            die ("Problemas con la conexion");

            return $con;

        }

        

        public function cerrarBase(){

            mysqli_close($this->conectarBase());

        }

    }

?>