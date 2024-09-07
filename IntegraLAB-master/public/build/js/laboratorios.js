async function verLaboratorio(id) {
    const laboratorio = await get(`laboratorio/ver?id=${id}`);
    const aulas = await get(`laboratorio/aulas?id=${id}`);
    $("body").append(`
        <div class="modal-overlay">
            <div class="modal-form">
                <div class="icono-img">
                    <button class="cerrar" id="cerrar-modal" onclick="removeModal()">
                        <img class="icono" src="build/img/volver.webp">
                    </button>
                    <img class="img" src="build/img/lab.webp">
                </div>
                <h4 class="blue-medium center">${laboratorio.nom_lab}</h4>
                <div class="descripcion">
                    <p>${laboratorio.descripcion_laboratorio}</p>
                </div>
                <div class="horario-lab"></div>
                <button class="btn-secundario" onclick="verMaterialesPorLaboratorio(${id}, '${laboratorio.nom_lab}')">Materiales</button>
                <div class="aula"></div>
                <form>
                    <button class="btn-principal" onclick="hacerReservacion()" type="button">Reservar</button>
                </form>
            </div>
        </div>
    `);
    $(".aula").empty();
    aulas.forEach(aula => {
        $(".aula").append(`
            <p class="center">Aula <span class="blue-dark">${aula.nom_aula}</span> capacidad <span class="blue-dark">${aula.capacidad_aula}</span></p>
        `);
    });
}

function hacerReservacion() {
    location.href = "/reservacion"
}

async function verMaterialesPorLaboratorio(id, nom_lab) {
    const materiales = await get(`laboratorio/materiales?id=${id}`)
    $("body").append(`
        <div class="modal-overlay">
            <div class="modal-form">
                <div class="icono-img">
                    <button class="cerrar" id="cerrar-modal" onclick="removeModal()">
                        <img class="icono" src="build/img/volver.webp">
                    </button>
                </div>
                <h4 class="blue-medium center">${nom_lab}</h4>
                <div id="materiales-lab"></div>
            </div>
        </div>
    `);
    $("#materiales-lab").empty();
    materiales.forEach(material => {
        $("#materiales-lab").append(`
            <p class="center">${material.nom_material} <span class="blue-dark">${material.existencia_material}</span></p> 
        `)
    })
}

function removeModal() {
    $("body").children().last().remove();
}