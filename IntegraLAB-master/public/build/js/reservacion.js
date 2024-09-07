(function() {
    $("#selectLaboratorio").on("change", () => {
        const id = $("#selectLaboratorio")[0].value;
        mostrarAulas(id);
    })
})();

let reservacionObj = {
    "id_lab": null,
    "id_aula": null,
    "dia": null,
    "hora_inicio": null,
    "hora_fin": null,
    "fecha": null,
    "verificada": false
}

let solicitudObj = {
    "id_reser": null,
    "material": []
}

async function mostrarMateriales() {
    if(!reservacionObj.id_lab) {
        alerta("error", "No ha seleccionado un laboratorio");
        return;
    }
    const materiales = await get(`laboratorio/materiales?id=${reservacionObj.id_lab}`)
    $("body").append(`
        <div class="modal-overlay">
            <div id="popup-container" class="modal-form">
                <div class="popup-content">
                    <div class="popup-header">
                    <h3 class="popup-title">Materiales</h3>
                    <button class="botoncerrar" id="close-popup" onclick="removeModal()">Cerrar</button>
                    </div>
                    <div class="popup-body">
                    <ul id="material-list"></ul>
                    <button id="save-materials" onclick="reservarMaterial()">Listo</button>
                    </div>
                </div>
            </div>
        </div>
    `)
    materiales.forEach(material => {
        const value = solicitudObj.material.find(mat => material.id === mat.id_material);
        $("#material-list").append(`
            <li class="materiales-reservacion">
                <img src="/imagenes/${material.imagen_material}" alt="Imagen 1">
                <input type="number" class="material-input" placeholder="Ingrese el material" data-target="${material.id}" value="${value == undefined ? 0 : value.cantidad_material}">
                <span class="material-number">${material.nom_material}</span>
            </li>
        `)
    })
}

function reservarMaterial() {
    const inputMateriales = document.querySelectorAll(".material-input");
    inputMateriales.forEach(input => {
        solicitudObj.material = [...solicitudObj.material, {"id_material": input.dataset.target, "cantidad_material": input.value}]
    })
    removeModal();
}

async function mostrarAulas(id) {
    reservacionObj.id_lab = id;
    const aulas = await get(`laboratorio/aulas?id=${id}`)
    $("#selectedAula").empty();
    $("#selectedAula").append("<option selected disabled value='0'>Aula</option>");
    aulas.forEach(aula => {
        $("#selectedAula").append(`
            <option value="${aula.id}">${aula.nom_aula}</option>
        `);
    })
}

function validarHorario() {
    reservacionObj.hora_inicio = $("#hora_inicio")[0].value;
    reservacionObj.hora_fin = $("#hora_fin")[0].value;
    reservacionObj.id_aula = parseInt($("#selectedAula")[0].value);
    if(!reservacionObj.id_lab) {
        alerta("error", "No ha seleccionado un laboratorio");
        return;
    }
    if(reservacionObj.id_aula == 0) {
        alerta("error", "No ha seleccionado una aula");
        return;
    }
    if(!reservacionObj.dia) {
        alerta("error", "No ha seleccionado un dia");
        return;
    }
    if(!reservacionObj.hora_inicio) {
        alerta("error", "No ha seleccionado una hora de inicio");
        return;
    }
    if(!reservacionObj.hora_fin) {
        alerta("error", "No ha seleccionado una hora fin");
        return;
    }
    if(obtenerMinutos(reservacionObj.hora_inicio) == obtenerMinutos(reservacionObj.hora_fin)){
        alerta("error", "La hora de inicio y fin es la misma");
        return;
    }
    obtenerFecha();
}

async function obtenerFecha() {
    const fecha = new Date();
    if(fecha.getDay() > parseInt(reservacionObj.dia)) {
        alerta("error", "No puede seleccionar un día pasado a hoy");
        return;
    }
    if(fecha.getDay() == parseInt(reservacionObj.dia)) {
        if(obtenerMinutos(`${fecha.getHours()}:${fecha.getMinutes()}`) > obtenerMinutos(reservacionObj.hora_inicio)){
            alerta("error", "No puede seleccionar una hora que ya paso")
            return;
        }
    }
    const nuevaFecha = new Date(fecha.setDate(fecha.getDate() + (parseInt(reservacionObj.dia) - fecha.getDay())));
    const date = `${nuevaFecha.getFullYear()}-${nuevaFecha.getMonth()+1}-${nuevaFecha.getDate()}`;
    reservacionObj.fecha = date;
    const reservaciones = await get(`reservacion/obtener/fecha?fecha_reser=${date}&id_lab=${reservacionObj.id_lab}&id_aula=${reservacionObj.id_aula}`);
    let error = false;
    reservaciones.forEach(reservacion => {
        const minInicio = obtenerMinutos(reservacion.hrinicio_reser);
        const minFin = obtenerMinutos(reservacion.hrtermino_reser);
        const minReservacionInicio = obtenerMinutos(reservacionObj.hora_inicio);
        const minReservacionFin = obtenerMinutos(reservacionObj.hora_fin);
        if(minInicio == minReservacionInicio) error = true;
        if(minReservacionInicio > minInicio && minReservacionInicio < minFin) error = true;
        if(minReservacionFin < minFin && minReservacionFin > minInicio) error = true;
    })
    if(error) {
        reservacionObj.verificada = false;
        alerta("error", "Horario no disponible");
        return;
    } else {
        reservacionObj.verificada = true;
        alerta("success", "Horario disponible");
        return;
    }
}

async function reservar() {
    if(!reservacionObj.verificada) {
        alerta("error", "Primero verifique horario");
        return;
    }
    let args = [];
    args["fecha_reser"] = reservacionObj.fecha;
    args["hrinicio_reser"] = reservacionObj.hora_inicio;
    args["hrtermino_reser"] = reservacionObj.hora_fin;
    args["id_lab"] = reservacionObj.id_lab;
    args["id_aula"] = reservacionObj.id_aula;
    args["tipo_reservacion"] = "Practicas";
    const respuesta = await post("reservacion/guardar", args);
    if(respuesta.id) {
        alerta("success", "Reservación exitosa!");
        solicitudObj.id_reser = respuesta.id
        solicitud();
    }
}

function solicitud() {
    let resultado = true;
    if(!solicitudObj.id_reser) {
        alerta("error", "Todavia no realiza una reservacion");
        return;
    }
    solicitudObj.material.forEach(async solicitudMaterial => {
        let args = [];
        args["id_reser"] = solicitudMaterial.id_reser;
        args["id_material"] = solicitudMaterial.id_material;
        args["cantidad_material"] = solicitudMaterial.cantidad_material;
        args["id_reser"] = solicitudObj.id_reser;
        const respuesta = await post("solicitud/material", args);
        if(!respuesta.resultado) resultado = false;
    })
    if(resultado) {
        alerta("success", "Solicitud de material confirmada");
    }

}

function cambiarDia(e) {
    reservacionObj.dia = e.value
}

function obtenerMinutos(hora){
    var spl = hora.split(":");
    return parseInt(spl[0])*60+parseInt(spl[1]);
}

function removeModal() {
    $("body").children().last().remove();
}

function regresar() {
    location.href = "http://localhost:1000/dashboard"
}