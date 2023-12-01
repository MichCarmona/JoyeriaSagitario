<?php

class Orden
{

    private $idOrden;
    private $fechOrden;
    private $fechaEntrega;
    private $numero_factura;
    private $estatus;
    private $totalOrden;
    private $numero_orden;
    private $idUsuario;
    private $idSucursal;
    private $idPago;

    public function conectarBase()
    {
        $con = mysqli_connect("localhost", "root", "", "joyeriasagitariooo") or
            die("Problemas con la conexión a la base de datos");
        return $con;
    }

    public function cerrarBase()
    {
        mysqli_close($this->conectarBase());
    }

    public function inicializar($fechOrden, $fechaEntrega, $numero_factura, $estatus, $totalOrden, $idUsuario, $idSucursal, $idPago)
    {

        $this->idUsuario = $idUsuario;
        $this->fechOrden = $fechOrden;
        $this->fechaEntrega = $fechaEntrega;
        $this->numero_factura = $numero_factura;
        $this->estatus = $estatus;
        $this->totalOrden = $totalOrden;
        $this->idSucursal = $idSucursal;
        $this->idPago = $idPago;
    }

    public function mostrarFormulario()
    {
        echo '
            <form action="../control/ordenCtrl.php" method="post" class="form-container">
                <h2>Crear Orden</h2>

                <label for="fecha_orden">Fecha de Pedido:</label>
                <input type="date" id="fecha_orden" name="fecha_orden" required oninput="calcularfechaEntrega()">
                <br><br>

                <label for="fecha_entrega">Fecha de Entrega:</label>
                <input type="date" id="fecha_entrega" name="fecha_entrega">
                <br><br>

                <label for="estatus">Estatus:</label>
                <select id="estatus" name="estatus" required>
                    <option value="En proceso">En proceso</option>
                    <option value="Enviado">Enviado</option>
                    <option value="Entregado">Entregado</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
                <br><br>

                <label for="total_orden">Total de la Orden:</label>
                <input type="number" id="total_orden" name="total_orden" required>
                <br><br>

                <label for="id_cliente">ID Cliente:</label>
                <select id="id_cliente" name="id_cliente" required>';

        // Obtener usuarios existentes
        $usuarios = $this->obtenerUsuarios();

        // Mostrar opciones de usuarios en el dropdown
        foreach ($usuarios as $usuario) {
            echo '<option value="' . $usuario['idUsuario'] . '">' . $usuario['nombre'] . '</option>';
        }

        echo '</select>
                <br><br>

                <label for="id_sucursal">Seleccionar Sucursal:</label>
                <select id="id_sucursal" name="id_sucursal" required>
                    ' . $this->generarOpcionesSelect($this->obtenerSucursales(), 'idSucursal', 'nombreSucursal') . '
                </select>
                <br><br>

                <label for="id_pago">Seleccionar Método de Pago:</label>
                <select id="id_pago" name="id_pago" required>
                    ' . $this->generarOpcionesSelect($this->obtenerMetodosPago(), 'idFormaPago', 'nombre') . '
                </select>
                <br><br>

                <input type="hidden" name="opcion" value="2">
                <br><br>

                <input type="submit" class="submit-btn">
            </form>

            <script>
                function calcularfechaEntrega() {
                    var fechaPedido = new Date(document.getElementById("fecha_orden").value);
                    fechaPedido.setDate(fechaPedido.getDate() + 5); // Sumar 5 días

                    var dia = ("0" + fechaPedido.getDate()).slice(-2);
                    var mes = ("0" + (fechaPedido.getMonth() + 1)).slice(-2);
                    var fechaFormateada = fechaPedido.getFullYear() + "-" + mes + "-" + dia;

                    document.getElementById("fecha_entrega").value = fechaFormateada;
                }
            </script>';
    }
    public function obtenerUsuarios()
    {
        $conexion = $this->conectarBase();

        $consultaUsuarios = "SELECT idUsuario, nombre FROM Usuario";
        $resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios);

        $usuarios = array();

        while ($row = mysqli_fetch_assoc($resultadoUsuarios)) {
            $usuarios[] = $row;
        }

        $this->cerrarBase();

        return $usuarios;
    }

    public function obtenerSucursales()
    {
        $conexion = $this->conectarBase();
        $sucursales = array();

        $consulta = "SELECT * FROM Sucursal";
        $resultado = mysqli_query($conexion, $consulta);

        while ($row = mysqli_fetch_assoc($resultado)) {
            $sucursales[] = $row;
        }

        $this->cerrarBase();
        return $sucursales;
    }

    public function obtenerMetodosPago()
    {
        $conexion = $this->conectarBase();
        $metodosPago = array();

        $consulta = "SELECT * FROM FormaPago";
        $resultado = mysqli_query($conexion, $consulta);

        while ($row = mysqli_fetch_assoc($resultado)) {
            $metodosPago[] = $row;
        }

        $this->cerrarBase();
        return $metodosPago;
    }

    // Método para generar opciones de un select
    private function generarOpcionesSelect($data, $valueKey = 'id', $textKey = 'nombre')
    {
        $options = '';
        foreach ($data as $item) {
            $options .= '<option value="' . $item[$valueKey] . '">' . $item[$textKey] . '</option>';
        }
        return $options;
    }

    public function insertarOrden()
    {
        $consultaDuplicados = "SELECT * FROM Orden WHERE numero_factura = '$this->numero_factura'";
        $resultadoDuplicados = mysqli_query($this->conectarBase(), $consultaDuplicados);

        if (mysqli_num_rows($resultadoDuplicados) > 0) {
            echo '<div class="mensaje-duplicado">Orden ya almacenada en la base de datos</div>';
        } else {
            $consultaInsertar = "INSERT INTO Orden (fechOrden, fechaEntrega, numero_factura, estatus, totalOrden, idUsuario, idSucursal, idPago)
                    VALUES ('$this->fechOrden', '$this->fechaEntrega', '$this->numero_factura', '$this->estatus', $this->totalOrden, $this->idUsuario, $this->idSucursal, $this->idPago)";

            echo "Consulta SQL: " . $consultaInsertar;

            $resultadoInsercion = mysqli_query($this->conectarBase(), $consultaInsertar);

            if ($resultadoInsercion) {
                echo '<div class="success-message">Inserción exitosa</div>';
            } else {
                echo '<div class="error-message">Error al insertar: ' . mysqli_error($this->conectarBase()) . '</div>';
            }
        }

        $this->cerrarBase();
    }

    public function listarOrdenes()
    {
        $registros = mysqli_query($this->conectarBase(), "SELECT * FROM orden ") or
            die(mysqli_error($this->conectarBase()));

        echo '<body>
            <table border="2" class="tablaUsuarios">
                <tr>
                    <th>idOrden</th>
                    <th>fechOrden</th>
                    <th>fechaEntrega</th>
                    <th>estatus</th>
                    <th>totalOrden</th>
                    <th>IdUsuario</th>
                    <th>idSucursal</th>
                    <th>idPago</th>
                    <th>Acción</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($registros)) {
            echo '<tr>';
            echo '<td>' . $row['idOrden'] . '</td>';
            echo '<td>' . $row['fechOrden'] . '</td>';
            echo '<td>' . $row['fechaEntrega'] . '</td>';
            echo '<td>' . $row['estatus'] . '</td>';
            echo '<td>' . $row['totalOrden'] . '</td>';
            echo '<td>' . $row['idUsuario'] . '</td>';
            echo '<td>' . $row['idSucursal'] . '</td>';
            echo '<td>' . $row['idPago'] . '</td>';
            echo '<td>';
            echo '
                <form action="../control/ordenCtrl.php" method="post">
                    <input type="hidden" name="opcion" value="3">
                    <input type="hidden" name="idOrden" value="' . $row['idOrden'] . '">
                    <select name="nuevoestatus">
                        <option value="En proceso">En proceso</option>
                        <option value="Enviado">Enviado</option>
                        <option value="Entregado">Entregado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>';

            if ($row['estatus'] !== 'Cancelado') {
                echo '<input type="submit" value="Actualizar">';
            } else {
                echo '<input type="submit" name="eliminar" value="Eliminar">';
            }

            echo '</form>
                </td>';
            echo '</tr>';
        }

        echo '</table></div></section><script src="script.js"></script></body>';
    }

    public function obtenerFormasPago()
    {
        $conexion = $this->conectarBase();
        $consulta = "SELECT * FROM FormaPago";
        $resultado = mysqli_query($conexion, $consulta);

        $formasPago = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $formasPago[] = $row;
        }

        return $formasPago;
    }

    public function obtenerOrdenesRecientes()
    {
        $conexion = $this->conectarBase();

        if (!$conexion) {
            die("Error en la conexión a la base de datos");
        }
        // Modificar la consulta para obtener las órdenes recientes
        $consulta = "SELECT * FROM Orden ORDER BY fechOrden DESC LIMIT 5";
        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($conexion));
        }

        $ordenesRecientes = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $ordenesRecientes[] = $row;
        }

        return $ordenesRecientes;
    }

    public function editarOrden($idOrden, $nuevoestatus)
    {
        if ($nuevoestatus === 'Cancelado') {
            $consulta = "DELETE FROM Orden WHERE idOrden = $idOrden";
        } else {
            $consulta = "UPDATE Orden SET estatus = '$nuevoestatus' WHERE idOrden = $idOrden";
        }

        $resultado = mysqli_query($this->conectarBase(), $consulta);

        if ($resultado) {
            if ($nuevoestatus === 'Cancelado') {
                echo "Orden cancelada correctamente";
            } else {
                echo "Orden actualizada correctamente";
            }
        } else {
            echo "Error al editar la orden: " . mysqli_error($this->conectarBase());
        }
        $this->cerrarBase();
    }
}
