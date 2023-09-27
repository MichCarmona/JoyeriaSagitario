const icono=document.querySelector('.icono-menu');
const menu=document.querySelector('.menu-navegacion');
const buscador =document.querySelector('.buscar input');
const buscador2 =document.querySelector('.buscar_resp input');


icono.addEventListener('click',function() {
    menu.classList.toggle('mostrar');
});


// Agregar el evento de clic al elemento
icono.addEventListener("click", function() {
    
    if (menu.style.display === "flex") {
        // Cambiar el valor de display a "none"
        menu.style.display = "none";

    } else {
        // Cambiar el valor de display a "flex"
        menu.style.display = "flex";
    }
});


window.addEventListener('click', e=>{
    if(window.innerWidth < 900 && e.target != menu && e.target != icono  && e.target != buscador && e.target != buscador2  ){
            menu.style.display = "none";
            menu.classList.remove ("mostrar");
        }
});

window.addEventListener('resize', function() {
    if (window.innerWidth > 900) {
        menu.style.display = "inline-block";
    } else {
        menu.style.display = "none";
    }
});

window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".menu-navegacion");
    if (window.scrollY > 0) {
        navbar.classList.add("scroll-activo");
    } else {
        navbar.classList.remove("scroll-activo");
    }
});

let prevScrollPos = window.pageYOffset; // Guarda la posición de desplazamiento anterior

window.addEventListener("scroll", function () {
    const currentScrollPos = window.pageYOffset;

    // Verifica si el usuario ha hecho scroll hacia arriba
    if (currentScrollPos > prevScrollPos) {
        // Si están haciendo scroll hacia abajo, oculta la barra de navegación
        document.querySelector(".menu-navegacion").style.transform = "translateY(-100%)";
    } else {
        // Si están haciendo scroll hacia arriba, muestra la barra de navegación
        document.querySelector(".menu-navegacion").style.transform = "translateY(0)";
    }

    prevScrollPos = currentScrollPos; // Actualiza la posición de desplazamiento anterior
});