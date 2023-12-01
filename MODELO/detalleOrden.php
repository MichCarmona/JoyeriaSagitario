<?php
class Detalle{

    public function conectarBase(){
        $con=mysqli_connect("localhost","root","","joyeria") or
        die("Problemas con la conexion a la base de datos");
        return $con;
       
    }
    public function cerrarBase(){
        mysqli_close($this->conectarBase());
    }
    
public function borrar(){
    $registro=mysqli_query($this->conectarBase(),"select * from detalleOrden
    where IDdetalleOrden='$_REQUEST[idOrden]'") or
die(mysqli_error($this->conectarBase()));
if ($reg=mysqli_fetch_array($registro)){
echo "El detalle orden con codigo: ".$reg[0]." fue fulminado";
mysqli_query($this->conectarBase(),"delete from detalleOrden where IDdetalleOrden='$_REQUEST[idOrden]'") or
    die(mysqli_error($this->conectarBase()));    
}else
echo "No se efectuo el procedimiento deseado. <br> Revisar la funcion del modelo";


}

public function enlistarDatoss(){
    $registros=mysqli_query($this->conectarBase(),
    "SELECT * from detalleOrden  inner join producto on
     producto.IDproducto=detalleOrden.IDproducto ") 
    or die 
    ("Error con el select".mysqli_error($this->conectarBase()));
    
   echo ' <div class="contenedorUsuarios">
   <table border="2" class="tablaUsuarios">
    <thead>
        <tr>
            <th>ID Detalle Orden</th>
            <th>ID Producto</th>
            <th>ID Cliente</th>
     
            <th>Valor Unitario</th>
            <th>Cantidad Pedida</th>
       <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>';
    while ($reg=mysqli_fetch_array($registros)){
        echo ' 
        <tr>
            <td>'.$reg[0].'</td>
            <td>'.$reg[1].'</td>
            <td>'.$reg[2].'</td>
            <td>'.$reg[8].'</td>
            <td>'.$reg[3].'</td>


            <td>
            <form action="../control/detalleOrden.php?idOrden='.$reg[0].'" method="post">
                <input type="hidden" name="opcion" value="22">
                <button >
                    <img  style="width: 30px; height: 30px;" src="../img/borrar.jpg" alt="">
                </button>
            </form>
               
            </td>
       
        </tr>';

}           
echo "</table>";
}
public function Producto(){
    $registro=mysqli_query($this->conectarBase(),"select * from producto
    where IDproducto='$_REQUEST[producto]'") or
die(mysqli_error($this->conectarBase()));
if ($reg=mysqli_fetch_array($registro)){

    echo '  <section id="seccionUsuarios">
   

<h2>  Confirmar compra </h2><br>
Total a pagar: '.$reg[4]*$_REQUEST["cantidad"].'

<form action="../control/detalleOrden.php" method="post">
<button>
   <input type="hidden" name="opcion" value="33">
   <input type="hidden" name="cantidad" value="'.$_REQUEST["cantidad"].'">
   <input type="hidden" name="producto" value="'.$_REQUEST["producto"].'">
   <input type="submit" value="Confirmar"> 
</button>
</form> 
    </div>';
}
}
public function Orden(){
    $IDcliente=rand(1,1250);
    $cantidad=$_REQUEST["cantidad"];
    $producto=$_REQUEST["producto"];
    mysqli_query($this->conectarBase(),"INSERT INTO detalleOrden(IDproducto,IDcliente,cantidadProducto)
    values
    ($producto,$IDcliente,$cantidad)")    or die ("Problemas en el insert".mysqli_error($this->conectarBase()));
    echo "<script>
    alert('Su compra fue realizada con exito , realice su pago.')
    window.location='../html/detalle.php';
    </script>";
}
}