<?php 

class Categoria{

    private $idCat;
    private $nombreCat;
    private $descripcionCat;
    

    public function inicializar($idCat,$nombreCat,$descripcionCat){
        $this -> idCat = $idCat;
        $this -> nombreCat= $nombreCat;
        $this -> descripcionCat = $descripcionCat;
        
    }

    public function conectarDB(){
        $con = mysqli_connect("localhost","root","","marco")or die("Problemas con la conexion".mysqli_error($con));
        // if($con){
        //     echo "conectado";
        // }else{
        //     echo "No estas conectado";
        // }
            return $con;
    }

    public function cerrarDB(){
        mysqli_close($this->conectarDB()) or die("Problemas para cerrar la conexion".mysqli_error($this->conectarDB()));
    }

    public function registrarCat(){
        $sqlConsultar = "select * from categoria where nombreCat='$this->nombreCat'";
        $queryConsultar = mysqli_query($this->conectarDB(),$sqlConsultar) or die("Problemas con la validacion de la categoria para su registro".mysqli_error($this->conectarDB()));

        if($reg = mysqli_fetch_array($queryConsultar)){
            //agregar div con estilos para mejor presentacion 
            echo "Categoria ya en existencia";
        }else{
            $sqlInsertar = "INSERT INTO categoria (idCategoria,nombreCat,descripcionCat)
                                        values('$this->idCat','$this->nombreCat','$this->descripcionCat');";
            $queryInsertar = mysqli_query($this->conectarDB(),$sqlInsertar) or die ("Problemas con la insercion de productos".mysqli_error($this->conectarDB()));   
            //agregar div con estilos para mejor presentacion 
            echo "Categoria Agregada";
        }
    }

    public function panelCat(){
        $registros=mysqli_query($this->conectarDB(), "SELECT * from categoria") or die(mysqli_error($this->conectarDB()));

        while($reg = mysqli_fetch_array($registros)){
            echo '
            <tr>
            <td>'.$reg[0].'</td>
            <td>'.$reg[1].'</td>
            <td>'.$reg[2].'</td>';
        echo '<td><form action="../control/ctrlCat.php?idCat='.$reg[0].'" method="post"  class="boton-nav">
        <input type="hidden" name="opcion" value="3">
        <button><i class="fa-regular fa-delete-left"></i>Borrar</button>
      </form>';
        echo '<form action="../control/ctrlCat.php?nombreCat='.$reg[1].'" method="post"  class="boton-nav">
        <input type="hidden" name="opcion" value="2">
        <button><i class="fa-regular fa-pen-to-square"></i>Actualizar</button>
      </form>
        </td>
        </tr>';

      
        }
    }

    

    public function modificarCategoria($nombreCat){
        $sql = "SELECT * FROM categoria where nombreCat='$nombreCat';";
        $consulta = mysqli_query($this->conectarDB(),$sql) or die ("Problemas al consultar la categoria para su modificacion".mysqli_error($this->conectarDB()));
        
        if($reg = mysqli_fetch_array($consulta)){


echo '<div class="contenedorUsuarios">

        <h2>Modificar Categoria</h2>

        <form action="../control/ctrlCat.php" method="post" class="form">
            
            <label for="nombre">ID Categoria:</label>
            <input type="text" name="idCat" value="'.$reg[0].'" readonly>
            <input type="hidden" name="idCatVieja">
            <br>

            <label>Nombre Categoria:</label>
            <input type="text" name="nombreCatNuevo" value="'.$reg[1].'" required>
            <input type="hidden" name="nombreCatVieja">
            <br>

           
            <label>Descripcion:</label>
            <textarea name="descNueva" id="" cols="30" rows="10">'.$reg[2].'</textarea>
            <input type="hidden" name="descVieja">
            <br>

            
            <input type="hidden" name="opcion" value="4">
            <input type="submit" value="Enviar">
        </form>

    </div>';



        }
        
        
    }

    public function actualizarCategoria($idCat,$nombreCatNuevo,$descNueva,$nombreCatVieja){
        // if($idCat == ){

        // }

        
        $registro = mysqli_query($this->conectarDB(), "SELECT * FROM categoria where idCategoria = '$idCat'") or die(mysqli_error($this->conectarDB()));
        if(!empty($registro)){
            $registro = mysqli_query($this->conectarDB(), "UPDATE categoria set nombreCat = '$nombreCatNuevo', descripcionCat = '$descNueva'
            where nombreCat = '$nombreCatVieja'") or die("No se pudieron actualizar los datos".mysqli_error($this->conectarDB()));
                
                 echo"La categoria se actualizo correctamente";
        }else{
            echo "La categoria no existe";
        }

       
    }

    public function eliminarCategoria($idCat){

        $registros=mysqli_query($this->conectarDB(), "SELECT * from categoria;")
        or die(mysqli_error($this->conectarDB()));
       if($reg=mysqli_fetch_array($registros)){
 
           $registros=mysqli_query($this->conectarDB(), "delete from categoria where idCategoria='$idCat'")or 
           die(mysqli_error($this->conectarDB()));
           echo "<br>Se elimino correctamente la categoria: " . $reg[1]; 
       }else{
           
           echo "No existe ese registro a eliminar";
       }
    }







}



?>