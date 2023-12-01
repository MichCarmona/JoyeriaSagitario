<?php

class Pago{

    private $monto;

    public function inicializar($monto){

        $this->monto = $monto;


    } public function conectarBD(){

        $con = mysqli_connect("localhost","root","","joyeriasagitariooo") or 
        die ("Problemas con la conexion a la BD");

        return $con;
    
    
    }public function agregarPago(){

        mysqli_query($this->conectarBD(),"INSERT INTO Pago (Monto)
        values ($this->monto)") or 
        die ("Problemas en el INSERT".mysqli_error($this->conectarBD()));

        echo "Nuevo Pago almacenado";
        

    }
        public function mostrarFormulario() {
            echo '<body>
                <form action="PagoCtrl.php" method="post">
                    <h2>Formulario de Pago</h2>
        
                    <label for="monto">Monto a Pagar:</label>
                    <input type="number" id="monto" name="monto" required placeholder="Ingrese el monto">
                    <input type="hidden" id="monto" name="opcion" value = 2 required placeholder="Ingrese el monto">
        
                    <button type="submit">Realizar Pago</button>
                </form>
            </body>';
        }


    public function listarPago(){

        
        $registros=mysqli_query($this->conectarBD(),"SELECT * FROM Pago") or 
        die (mysqli_error($this->conectarBD()));

        echo '<body>

    
        <section id="seccionUsuarios">
    
            <div class="contenedorUsuarios">
    
                <h1>PagoS</h1>
    
                <table border="2" class="tablaUsuarios">
    
                    <tr><th>idPago</th><th>Monto</th><th>Eliminar</th></tr>';
        
        while ($row = mysqli_fetch_assoc($registros)) {
            echo '<tr>';
            echo '<td>' . $row['idPago'] . '</td>';
            echo '<td>' . $row['Monto'] . '</td>';
            echo '<td><a href="PagoCtrl.php?opcion= 3&codigo=' . $row['idPago'] . '">Borrar</a></td>';
            
                
            
        }
    
        echo '</table></div></section><script src="script.js"></script></body>';
        
       
    }public function eliminarPago($codigo){

        $registro=mysqli_query($this->conectarBD(),"SELECT * FROM Pago ") or 
        die (mysqli_error($this->conectarBD()));

            if ($reg = mysqli_fetch_array($registro)) {
            
            mysqli_query($this->conectarBD(), "DELETE FROM Pago WHERE idPago = $codigo")
            or die(mysqli_error($this->conectarBD()));

            
            } else {

                echo 'ERROR';

                }


    }public function consultarPago($codigo){

        $registro=mysqli_query($this->conectarBD(),"SELECT * FROM Pago
        WHERE idPago = '$codigo' ") or 
        die (mysqli_error($this->conectarBD()));

   
        if($reg=mysqli_fetch_array($registro)){
   
           echo '<div class="resultado-consulta">';
           echo "<p><strong>Codigo del Pago</strong>  ". $reg['0'] ."<readonly> </p> <br>";
           echo '<p><strong>Monto:</strong> ' . $reg['1'] . '</p> <br>';
           
          

   
       } else {
   
           echo '<div class="resultado-consulta error">ERRO</div>';
       }


    }public function cerrarBD(){

        mysqli_close($this->conectarBD());
        
    }
    
    
    }
