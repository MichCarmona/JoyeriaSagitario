<?php 

class Producto{

    private $nombreProd;
    private $descripcionProd;
    private $cantidadExistente;
    private $precioVenta;
    private $precioCompra;
    private $idCategoria;

    public function inicializar($nombreProd,$descripcionProd,$cantidadExistente,$precioVenta,$precioCompra,$idCategoria){
        $this -> nombreProd= $nombreProd;
        $this -> descripcionProd = $descripcionProd;
        $this -> cantidadExistente = $cantidadExistente;
        $this -> precioVenta = $precioVenta;
        $this -> precioCompra = $precioCompra;
        $this -> idCategoria = $idCategoria;
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

    public function registrarProducto(){
        $sqlConsultar = "select * from productos where nombreProd='$this->nombreProd'";
        $queryConsultar = mysqli_query($this->conectarDB(),$sqlConsultar) or die("Problemas con la validacion del producto".mysqli_error($this->conectarDB()));

        if($reg = mysqli_fetch_array($queryConsultar)){
            //agregar div con estilos para mejor presentacion 
            echo "Producto ya en existencia";
        }else{
            $sqlInsertar = "INSERT INTO productos (nombreProd,descripcionProd,cantidadExistente,precioVenta,precioCompra,idCat)
                                        values('$this->nombreProd','$this->descripcionProd','$this->cantidadExistente','$this->precioVenta','$this->precioCompra','$this->idCategoria');";
            $queryInsertar = mysqli_query($this->conectarDB(),$sqlInsertar) or die ("Problemas con la insercion de productos".mysqli_error($this->conectarDB()));   
            //agregar div con estilos para mejor presentacion 
            echo "Producto Agregado";
        }
    }

    public function panelProductos(){
        $registros=mysqli_query($this->conectarDB(), "SELECT * from productos p inner join categoria c on p.idCat = c.idCategoria") or die(mysqli_error($this->conectarDB()));

        while($reg = mysqli_fetch_array($registros)){
            echo '
            <tr>
            <td>'.$reg[0].'</td>
            <td>'.$reg[1].'</td>
            <td>'.$reg[2].'</td>
            <td>'.$reg[3].'</td>
            <td>'.$reg[4].'</td>
            <td>'.$reg[5].'</td>
            <td>'.$reg[6].'</td>
            <td>'.$reg[8].'</td>
            <td>'.$reg[9].'</td>';
        echo '<td><form action="../control/ctrlProducto.php?idProd='.$reg[0].'" method="post"  class="boton-nav">
        <input type="hidden" name="opcion" value="3">
        <button><i class="fa-regular fa-delete-left"></i></button>
      </form>';
        echo '<form action="../control/ctrlProducto.php?nombreProd='.$reg[1].'" method="post"  class="boton-nav">
        <input type="hidden" name="opcion" value="2">
        <button><i class="fa-regular fa-pen-to-square"></i></button>
      </form>
        </td>
        </tr>';

      
        }
    }

    public function obtenerIDProducto(){
        $registros = mysqli_query($this->conectarDB(),"select * from productos;");

    }

    public function modificarProductos($nombreProd){
        $sql = "SELECT * FROM productos where nombreProd='$nombreProd';";
        $consulta = mysqli_query($this->conectarDB(),$sql) or die ("Problemas al consultar productos para su modificacion".mysqli_error($this->conectarDB()));
        
        if($reg = mysqli_fetch_array($consulta)){


echo '<div class="contenedorUsuarios">

        <h2>Modificar Producto</h2>

        <form action="../control/ctrlProducto.php" method="post" class="form">
            <!-- Input 1: Nombre Producto -->
            <label for="nombre">ID Producto:</label>
            <input type="text" name="idProd" value="'.$reg[0].'" readonly>
            <br>

            <label>Nombre Producto:</label>
            <input type="text" name="nombreProdNuevo" value="'.$reg[1].'" required>
            <input type="hidden" name="nombreProdViejo">
            <br>

           
            <label>Descripcion:</label>
            <textarea name="descNueva" id="" cols="30" rows="10">'.$reg[2].'</textarea>
            <input type="hidden" name="descVieja">
            <br>

            <!-- Input 3: Cantidad Existente -->
            <label>Cantidad:</label>
            <input type="number" name="cantidadExistenteNueva" value="'.$reg[3].'" required>
            <input type="hidden" name="cantidadExistenteVieja">
            <br>

            <!-- Input 4: Precio Venta -->
            <label >Precio Venta:</label>
            <input type="number"  name="precioVentaNuevo" value="'.$reg[4].'" required>
            <input type="hidden" name="precioVentaViejo">
            <br>

            <!-- Input 5: Precio Compra -->
            <label>Precio Compra:</label>
            <input type="number" name="precioCompraNuevo" value="'.$reg[5].'" required>
            <input type="hidden" name="precioCompraViejo">
            <br>

            <!-- Input 6: Categoria -->
            <label>Categoria:</label>
            <input type="number"  name="idCategoriaNueva" min="1" max="6" value="'.$reg[6].'" required>
            <br>


            <input type="hidden" name="opcion" value="4">
            <input type="submit" value="Enviar">
        </form>

    </div>';



        }
        
        
    }

    public function actualizarProducto($idProd,$nombreProdNuevo,$descNueva,$cantidadExistenteNueva,$precioVentaNuevo,$precioCompraNuevo,$idCategoriaNueva,$nombreProdViejo){

        $registro = mysqli_query($this->conectarDB(), "SELECT * FROM productos where idProd = '$idProd'") or die(mysqli_error($this->conectarDB()));
        if(!empty($registro)){
             $registro = mysqli_query($this->conectarDB(), "UPDATE productos set nombreProd = '$nombreProdNuevo', descripcionProd = '$descNueva',
            cantidadExistente = '$cantidadExistenteNueva', precioVenta = '$precioVentaNuevo', precioCompra = '$precioCompraNuevo', idCat = '$idCategoriaNueva'
            where nombreProd = '$nombreProdViejo'") or die(mysqli_error($this->conectarDB()));
            
              echo"El producto fue modificado con exito";
        }else{
            echo "El producto no existe";
        }
           
            
        
    }

    public function eliminarProducto($idProd){

        $registros=mysqli_query($this->conectarDB(), "SELECT * from productos p inner join categoria c on p.idCat = c.idCategoria;")
        or die(mysqli_error($this->conectarDB()));
       if($reg=mysqli_fetch_array($registros)){
 
           $registros=mysqli_query($this->conectarDB(), "delete from productos where idProd='$idProd'")or 
           die(mysqli_error($this->conectarDB()));
           echo "<br>Se elimino correctamente el registro: "; 
       }else{
           
           echo "No existe ese registro para eliminar";
       }
    }

    public function mostrarProductoGaleria(){
        $sql = "SELECT * from productos p inner join categoria c on p.idCat = c.idCategoria;";
        $query = mysqli_query($this->conectarDB(),$sql) or die("Problemas al mostrar producto".mysqli_error($this->conectarDB()));


    }







}



?>