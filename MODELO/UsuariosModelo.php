<?php

    class Usuario{

        public function conectarBase(){

            $con = mysqli_connect("localhost","root","", "joyeriasagitarioo")
            or
            die ("Problemas con la conexion");

            return $con;

        }

        public function listarUsuarios(){

            $consulta = mysqli_query($this->conectarBase(), "SELECT * FROM usuario")
            or
            die (mysqli_error($this->conectarBase()));

            ?>

                <table border="1.5" class="tablaUsuarios">

                <thead>

                    <tr class="encabezadoTabla">
                        <th>IdUsuario</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>TipoUsuario</th>
                        <th>Accion</th>
                    </tr>

                </thead>

            <?php

                while($reg=mysqli_fetch_array($consulta)){

            ?>
                    
                <tbody>

                    <tr>
                        <td><?php echo $reg[0] ?></td>
                        <td><?php echo $reg[1] ?></td>
                        <td><?php echo $reg[2] ?></td>
                        <td><?php echo $reg[3] ?></td>
                        <td><?php echo $reg[4] ?></td>
                        <td><?php echo $reg[5] ?></td>
                        <td><?php echo $reg[6] ?></td>
                        <td>
                            <form action="#" method="post">
                                <input type="submit" name="eliminar" value="Eliminar" class="aceptar">
                            </form>
                        </td>
                    </tr>
                
                </tbody>

            <?php

                }
            
            ?>
            
            </table>

            <?php

        }

        public function cerrarBase(){

            mysqli_close($this->conectarBase());

        }


    }

?>