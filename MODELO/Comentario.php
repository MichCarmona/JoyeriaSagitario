<?php
class Comentario{
    private $mensaje;
    private $mail;
    private $consulta;
    private $formularioEnviado;

    public function inicializar($mensaje, $mail, $consulta){
        $this->mensaje=$mensaje;
        $this->mail=$mail;
        $this->consulta=$consulta;
    }

    public function connectionBd(){
        $con=mysqli_connect("localhost","root","","base1") or die ("Errores con la coneccion de base de datos.");
        return $con;
    }
    
    public function ingresarMensaje() {
            // Se ha enviado el formulario
    
            // Verificar si el correo ya ha enviado un mensaje
            $validacion = "SELECT mail FROM contacto WHERE mail='$this->mail'";
            $registros = mysqli_query($this->connectionBd(), $validacion);
    
            if (mysqli_num_rows($registros) > 0) {
                return $this->mensajeError();
            } else {
                // Insertar el mensaje en la base de datos
                $fecha = new DateTime();
                $fechaFormateada = $fecha->format('Y-m-d H:i:s'); // Formato compatible con MySQL
                $insertarMensaje = "INSERT INTO contacto (consulta, fecha, mensaje, mail) VALUES ('$this->consulta', '$fechaFormateada', '$this->mensaje', '$this->mail')";
    
                if (mysqli_query($this->connectionBd(), $insertarMensaje)) {
                    return $this->mensajeEnviado();
                } else {
                    return 'Problema al enviar el mensaje: ' . mysqli_error($this->connectionBd());
                }
            }

    }
    
    
    
    

    public function listarMensaje(){
        // Definir un array asociativo para mapear números a textos
        $consultaTextos = [
            1 => "Felicitacion",
            2 => "Inconformidad",
            3 => "Sugerencia"
        ];
    
        $registros = mysqli_query($this->connectionBd(), "SELECT * FROM contacto c INNER JOIN alumnos a ON a.mail = c.mail") 
            or die("Error al obtener los datos de los comentarios: " . mysqli_error($this->connectionBd()));
        echo '<br>';
  echo '<table border="2" class="tablaUsuarios">';
echo '<thead>';
echo '<tr class="encabezadoTabla">';
echo '<th>Código</th>';
echo '<th>Tipo Contacto</th>';
echo '<th>Fecha</th>';
echo '<th>Mensaje</th>';
echo '<th>Correo Electrónico</th>';
echo '<th>Opciones</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($reg = mysqli_fetch_array($registros)) {
    echo '<tr>';
    echo '<td>' . $reg[0] . '</td>';
    
    // Verificar si el número de consulta está en el array y mostrar el texto que se mapeó 
    if (isset($consultaTextos[$reg[1]])) {
        echo '<td>' . $consultaTextos[$reg[1]] . '</td>';
    }
    echo '<td>' . $reg['2'] . '</td>';
    echo '<td>' . $reg['3'] . '</td>';
    echo '<td>' . $reg['4'] . '</td>';
    echo '<td>';

    echo'<ul>';
    echo '<a href="../control/contacto.php?codigo=' . $reg[0] . '&opcion=5">Borrar</a>';
    echo '</li>';
    echo'</ul>';

    echo '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
    }
    
    
    public function consultarMensaje($mail){
        $registro=mysqli_query($this->connectionBd(),"SELECT * FROM contacto c INNER JOIN alumnos a on c.mail=a.mail WHERE mail='$mail'")or
        die("Error al consultar el alumno".mysqli_error($this->connectionBd()));
   
        if($reg=mysqli_fetch_array($registro)){
           echo "Codigo:".$reg[0]."<br>";
           echo "Consulta:".$reg['1']."<br>";
           echo "Fecha:".$reg['2']."<br>";
           echo "Mensaje:".$reg['3']."<br>";
           echo "Mail:".$reg['4']."<br>";
        }else{
           echo 'El mensaje con este correo no existe';
        }
    }

    public function borrarMensaje($codigo, $mostrarFormulario = true){
        $registros=mysqli_query($this->connectionBd(),"SELECT * FROM contacto WHERE codigo='$codigo'") or
            die("Error al conectar en la base de datos".mysqli_error($this->connectionBd()));
    
        if($reg=mysqli_fetch_array($registros)){
            echo "Correo electrónico: ".$reg['4']."<br>";
            echo "Código: ".$reg[0]."<br>";
            echo "Mensaje: ".$reg['3']."<br>";           
            mysqli_query($this->connectionBd(),"DELETE FROM contacto WHERE codigo='$codigo'") or
                die("Error al eliminar el mensaje".mysqli_error($this->connectionBd()));
                echo '<form action="../control/contacto.php" method="post">' . 
                '<input type="hidden" name="codigo" value="'.$_REQUEST['codigo'].'">'.
                '<input type="hidden" name="opcion" value="3">'.
                '<input type="submit" action="../control/contacto.php" value="Recargar">' .
                '</form>';
            // echo $this->listarMensaje();
        // } else {
        //     echo 'No se encontró el código para borrar el mensaje';
        // }
    
        // Solo imprime el formulario si $mostrarFormulario es true
        // if ($mostrarFormulario) {
        //     echo '<form action="../contacto.php" method="post"><input type="hidden" name="opcion" value="3">
        //     <input type="submit" value="Regresar"></form>';
        // }
    }
    }
    



    public function CloseBd(){
        mysqli_close($this->connectionBd());
        echo"La base de datos se ha cerrado.";
    }

    public function impPanel(){

            echo '
            <form action="./index.php" method="post"> 
            <p class="comentariosp"><h4>Por favor, dejenos sus comentarios!</h4></p>
            <p>¿Como le parecieron nuestros servicios? </p>
            <select class="select1" name="tipom">
                <option value="1">Felicitaciones</option>
                <option value="2">Inconformidad</option>
                <option value="3">Sugerencia</option>
            </select>
    
                <div>
                    <br>
                <p>Cuentanos tu experiencia!</p>
                <textarea class="textarea1" name="mensaje" placeholder="Escribe aqui!"></textarea><br>
                <input class="input2" type="email" name="mail" placeholder="Tu direccion de correo" required>
                <input class="input1" type="hidden" name="opcion" value="1">
                <input class="input1" id="enviar" type="submit" value="Enviar" name="Enviar">
            </form>
                </div>';  


    }

    // Funcion para imprimr mensajes en el index
    public function impIndex(){
        $consulta = "SELECT c.*, a.nombre FROM contacto c INNER JOIN alumnos a ON a.mail = c.mail WHERE c.consulta = 1";
        $registros = mysqli_query($this->connectionBd(), $consulta) or die("Error al obtener los mensajes: " . mysqli_error($this->connectionBd()));

        echo "<h2>Comentarios de clientes:</h2>";
        while ($reg = mysqli_fetch_array($registros)) {
            echo '<p>';
            echo '<strong>Nuestro cliente </strong> ' . $reg['nombre'] . '<br>';
            echo '<strong></strong> ' . $reg['mensaje'] . '<br>';
            echo '</p>';
        }
         
    }

    public function mensajeError(){
        echo '<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>';
        echo '<script> alertify.error("El correo ya ha mandado mensaje, intente con otro"); </script>';
    }

    public function mensajeEnviado(){
        echo '<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>';
        echo '<script> alertify.error("Muchas gracias por sus comentarios!"); </script>';
    }


        
}


?>


<!-- Agregar validacion al borrar curso, pues no se puede eliminar si ya esta sociado a un alumno -->