

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyería Sagitario</title>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/695a7fc4ef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../vista/style.css">
</head><!--  -->

<body>

    <!-- INICIO ENCABEZADO -->
    <header id="encabezadoAd">

        <!-- INICIO NAV -->
        <nav id="navAd">
            <section class="admi">
                <a href="administrador.html">Inicio</a>
                <a href="productos.html">Productos</a>
                <a href="Usuarios.html">Usuarios</a>
                <a href="contacto.html">Contacto</a>
                <a href="ordenes.html">Ordenes</a>
                <a href="pago.html">Pago</a>
                <a href="index.html">Cerrar sesion</a>


            </section>
        </nav>


    </header>

<?php 
include "../modelo/modeloCat.php";

$cat = new Categoria();
$cat -> conectarDB();

switch($_REQUEST['opcion']){
    case "1":
        $cat ->inicializar($_REQUEST['idCat'],$_REQUEST['nombreCat'],$_REQUEST['descripcionCat']);
        $cat -> registrarCat();
        break;

    case "2":
        $cat -> modificarCategoria($_REQUEST['nombreCat']);
        break;
        
    case "3":
        $cat -> eliminarCategoria($_REQUEST['idCat']);
        break;
        
    case "4":
        $cat -> actualizarCategoria($_REQUEST['idCat'],$_REQUEST['nombreCatNuevo'],$_REQUEST['descNueva'],$_REQUEST['nombreCatVieja']);
        break;    

}



?>

<footer class="section-p1">
    <div class="col">
        <h4>Contacto</h4>
        <p> <strong> Direccion: </strong> Av. Chimalhuacán 340,
            <br>
            <br> entre Paloma Negra Y Calle Gaviota,
            <br>
            <br> 57000 Nezahualcóyotl, Estado de México
        </p>
        <p> <strong> Telefono: </strong> 5512345678</p>
        <p> <strong> Horario de atencion: </strong> L-V 8:00 a 20:00 hrs.</p>
        <p> <strong>Festivos de: </strong> 12:00 a 17:00 hrs.</p>
        <div class="follow">
            <h4>Síguenos en nuestras redes</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="col">
        <!-- <h4>Acerca de nosotros</h4> -->
        <a href="about.html">Acerca de nosotros</a>
        <a href="politics.html">Políticas de privacidad</a>
        <a href="contactus.html">Contáctanos</a>
        <a href="#">Ayuda</a>
        <section class="logoF">
            <br>
            <img class="logoF" src="img/joyeria/joyeria/LOGO/c-rem.png" alt="">
        </section>
    </div>

    <div class="col">
        <!-- <h4>Mi cuenta</h4> -->
        <a href="login.html">Registrarme</a>
        <a href="#">Compras</a>
        <a href="#">Lista de deseos</a> <br>
        <section class="footertext">
            <p class="comentariosp">Por favor, dejenos sus comentarios!</p>
            <p>¿Como le parecieron nuestros servicios? </p>
            <select name="comentarios">
                <option value="Felicitacion">Felicitaciones</option>
                <option value="Sugerencia">Sugerencia</option>
                <option value="Inconformidad">Inconformidad</option>
                </select>
                <div>
                    <br>
                <p>Cuentanos tu experiencia!</p>
                <textarea placeholder="Escribe aqui!"></textarea><br>
                <input type="button" value="Enviar"name="Enviar">
                </div>
        </section>
    </div>

    <div class="copyright">
        <p>2023, BOOSTAPPS equipo de desarrollo - ECOMMERCE SITIO APLICACIONES WEB</p>
    </div>
</footer>