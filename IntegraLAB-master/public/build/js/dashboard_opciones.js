(function (){
});
const carrusel = document.querySelector(".carrusel-items");
const actividades = $("#actividades").on("click", () => {
    location = "/actividades";
});
const laboratorio = $("#laboratorio").on("click", () => {
    location = "/laboratorio";
});
const calendario = $("#calendario").on("click", () => {
    location = "/calendario";
});
const evento = $("#evento").on("click", () => {
    location = "/evento";
});
const historial = $("#historial").on("click", () => {
    location = "/historial";
});
const reporte = $("#reporte").on("click", () => {
    location = "/reporte";
});
let maxScrollLeft = carrusel.scrollWidth - carrusel.clientWidth;
let intervalo = null;
let step = 2;
const start = () =>{
    intervalo = setInterval(function (){
        carrusel.scrollLeft = carrusel.scrollLeft + step;
        if(carrusel.scrollLeft == maxScrollLeft){
            step = step * -1;
        } else if(carrusel.scrollLeft == 0){
            step = step * -1;
        }
    }, 10)
}
const stop = () => {
    clearInterval(intervalo);
}

carrusel.addEventListener("mouseover", ()  => {
    stop();
})
carrusel.addEventListener("mouseout", ()  => {
    start();
})
start();