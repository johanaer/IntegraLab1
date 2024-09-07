async function mostrarMateriales(id){
    const laboratorio = await get(`laboratorio/ver?id=${id}`)
    const materiales = await get(`laboratorio/materiales?id=${id}`);
    $("main").append(`
        <div class="modal-overlay view-materiales">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <h1 class="blue-dark bold center">Inventario del laboratorio</h1>
                <h2 class="blue-dark bold center">${laboratorio.nom_lab}</h2> <!-- Laboratorio seleccionado -->
                <section class="todos-materiales"></section>
                <div class="btns-agregar">
                    <button class="mas"  onclick="agregarMaterial(${laboratorio.id})">
                        <img src="build/img/mas.webp">
                    </button>
                </div>
            </div>
        </div>
    `);
    materiales.forEach(material => {
        $(".todos-materiales").append(`
            <article>
                <div class="img-material">
                    <img src="/imagenes/${material.imagen_material}">
                </div>
                <div class="contenido">
                    <p>${material.nom_material}</p>
                    <div class="capacidad-cantidad">
                        <p>Cantidad</p>
                        <p>${material.existencia_material}</p>
                    </div>
                </div>
                <div class="img-editar" onclick="editarMaterial(${material.id}, ${laboratorio.id})">
                    <img src="build/img/editar.webp">
                </div>
            </article>
        `)
    })
}
function agregarMaterial(id){
    $("main").append(`
        <div class="modal-overlay editar-material">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <div class="update-material">
                    <div class="campo">
                        <label for="imagen">Imagen: </label>
                        <input name="imagen" id="imagen" type="file" placeholder="Nombre del material" accept="image/*">
                    </div>
                    <div class="campo">
                        <label for="name">Nombre: </label>
                        <input name="name" id="nombre" type="text" placeholder="Nombre del material">
                    </div>
                    <div class="campo">
                        <label for="cantidad">Cantidad: </label>
                        <input name="cantidad" id="cantidad" type="number" placeholder="Cantidad del material" min="0">
                    </div>
                </div>
                <div class="btns-editar-material">
                    <button class="btn-principal" onclick="guardarMaterial(${id})" type="button">Confirmar</button>
                </div>
            </div>
        </div>
    `);
}
async function editarMaterial(id, id_lab){
    const material = await get(`laboratorio/material?id=${id}`)
    $("main").append(`
        <div class="modal-overlay editar-material">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <div class="update-material">
                    <div class="campo">
                        <label for="imagen">Imagen: </label>
                        <input name="imagen" id="imagen" type="file" placeholder="Nombre del material" accept="image/*">
                    </div>
                    <img src="/imagenes/${material.imagen_material}">
                    <div class="campo">
                        <label for="name">Nombre: </label>
                        <input name="name" id="nombre" type="text" placeholder="Nombre del material" value="${material.nom_material}">
                    </div>
                    <div class="campo">
                        <label for="cantidad">Cantidad: </label>
                        <input name="cantidad" id="cantidad" type="number" placeholder="Cantidad del material" min="0" value="${material.existencia_material}">
                    </div>
                </div>
                <div class="btns-editar-material">
                    <button class="btn-principal" type="button" onclick="actualizarMaterial(${id}, ${id_lab})">Confirmar</button>
                    <button class="btn-enlace" type="button" onclick="eliminarMaterial(${id})">Eliminar</button>
                </div>
            </div>
        </div>
    `);
}

async function mostrarProfesor(id) {
    const laboratorio = await get(`laboratorio/ver?id=${id}`)
    const profesores = await get(`laboratorio/usuarios?id=${id}`);
    $("main").append(`
        <div class="modal-overlay mostrar-profesor">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <h1 class="blue-dark center bold">Lista de profesores</h1>
                <h2 class="blue-dark center bold">${laboratorio.nom_lab}</h2> <!-- Laboratorio -->
                <section class="profesores"></section>
                <div class="btns-agregar">
                    <button class="mas" onclick="añadirProfesor(${id})">
                        <img src="build/img/mas.webp">
                    </button>
                    <label>Agregar</label>
                </div>
            </div>
        </div>
    `);
    profesores.forEach(profesor => {
        $(".profesores").append(`
            <article onclick="verProfesorClick(${profesor.id})">
                <img src="build/img/user.webp">
                <p>${profesor.nom_usuario}</p>
            </article>
        `)
    })
}

async function verProfesorClick(id) {
    const profesor = await get(`usuarios?id=${id}`)
    $("main").append(`
        <div class="modal-overlay ver-profesor-click">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <div class="icon-ver-profesor">
                    <img src="build/img/user.webp">
                </div>
                <div class="info-profesor">
                    <div class="profesor-icono-editar">
                        <p>${profesor.nom_usuario}</p> <!-- Nombre del profesor -->
                        <img src="build/img/editar.webp" onclick="editarProfesor(${id})">
                    </div>
                    <p>${profesor.correo_usuario}</p> <!-- Correo del profesor -->
                    <p>PIN: ${profesor.pass_usuario}</p> <!-- NUA del profesor -->
                </div>
            </div>
        </div>
    `);
}

async function editarProfesor(id) {
    const profesor = await get(`usuarios?id=${id}`)
    $("main").append(`
    <div class="modal-overlay add-profesor">
        <div class="modal-form">
            <div class="btn-img">
                <button id="btn-cerrar-modal" onclick="removeModal()">
                    <img src="build/img/icono-x.webp">
                </button>
            </div>
            <h1 class="blue-dark bold">Actualizar profesor</h1>
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input name="nombre" placeholder="Nombre del profesor" type="text" id="nombre" value="${profesor.nom_usuario}">
            </div>
            <div class="campo">
                <label for="email">Correo:</label>
                <input name="email" placeholder="Email del profesor" type="email" id="email" value="${profesor.correo_usuario}">
            </div>
            <div class="campo">
                <label for="password">Contraseña:</label>
                <input name="password" placeholder="Contraseña del profesor" type="password" id="password" value="${profesor.pass_usuario}">
            </div>
            <div class="btn-añadir">
                <button class="añadir btn-principal" onclick="actualizarProfesor(${id})">Actualizar</button>
            </div>
        </div>
    </div>
    `);
}

function añadirProfesor(id){
    $("main").append(`
    <div class="modal-overlay add-profesor">
    <div class="modal-form">
        <div class="btn-img">
            <button id="btn-cerrar-modal" onclick="removeModal()">
                <img src="build/img/icono-x.webp">
            </button>
        </div>
        <h1 class="blue-dark bold">Agregar profesor</h1>
        <div class="campo">
            <label for="nombre">Nombre:</label>
            <input name="nombre" placeholder="Nombre del profesor" type="text" id="nombre">
        </div>
        <div class="campo">
            <label for="email">Correo:</label>
            <input name="email" placeholder="Email del profesor" type="email" id="email">
        </div>
        <div class="campo">
            <label for="password">Contraseña:</label>
            <input name="password" placeholder="Contraseña del profesor" type="password" id="password">
        </div>
        <div class="btn-añadir">
            <button class="añadir btn-principal" onclick="agregarProfesor(${id})">Añadir</button>
        </div>
    </div>
</div>
    `);
}

async function mostrarUser(id){
    const usuario = await get(`usuarios?id=${id}`);
    $("main").append(
        `<div class="modal-overlay user-encargados" id="modal-view-user">
        <div class="modal-form">
            <div class="btn-img">
                <button id="btn-cerrar-modal" onclick="removeModal()">
                    <img src="build/img/icono-x.webp">
                </button>
            </div>
            <div class="icono-img">
                <img class="img" src="build/img/user.webp">
            </div>
            <div class="name-user">
                <p class="center blue-dark bold">${usuario.nom_usuario}</p> <!-- Va el usuario encargado correspondiente -->
                <button id="editarUsuario" onclick="editarUsuario(${id})">
                    <img src="build/img/editar.webp">
                </button>
            </div>
            <div class="container">
                <p class="blue-dark bold">${usuario.correo_usuario}</p>
            </div>
            </section>
            <div class="btn-eliminar">
                <button class="btn-principal" id="btn-eliminar">Eliminar</button>
            </div>
        </div>
    </div>`
    );
}

async function editarUsuario(id) {
    const usuario = await get(`usuarios?id=${id}`);
    $("main").append(`    
        <div class="modal-overlay view-update-user">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <h1 class="blue-dark bold center">Editar usuario</h1>
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" placeholder="Nombre" type="text" id="nombre" value="${usuario.nom_usuario}">
                </div>
                <div class="campo">
                    <label for="email">Correo:</label>
                    <input name="email" placeholder="Email" type="email" disabled value="${usuario.correo_usuario}">
                </div>
                <div class="campo">
                    <label for="password">Contraseña:</label>
                    <input name="password" placeholder="Contraseña" type="password" id="password" value="${usuario.pass_usuario}">
                </div>
                <div class="btn-añadir">
                    <button class="añadir btn-principal" onclick="actualizarUsuario(${id})">Actualizar</button>
                </div>
            </div>
        </div>
    `);
}

async function mostrarAulas(id){
    const laboratorio = await get(`laboratorio/ver?id=${id}`)
    const aulas = await get(`laboratorio/aulas?id=${id}`);
    $("main").append(`
        <div class="modal-overlay mostrar-aulas" id="overlay-aulas-1">
        <div class="modal-form">
            <div class="btn-img">
                <button id="btn-cerrar-modal" onclick="removeModal()">
                    <img src="build/img/volver.webp">
                </button>
            </div>
            <h1 class="center blue-dark bold">${laboratorio.nom_lab}</h1> <!-- Va el laboratorio correspondiente -->
            <div class="modal-aulas-scroll"></div>
            <div class="btns-info-add">
                <button class="info" onclick="infoModalAula()">
                    <img src="build/img/info.webp">
                </button>
                <button class="add btn-principal" onclick="addAula(${laboratorio.id})">Agregar aula</button>
            </div>
        </div>
    </div>
    `);
    aulas.forEach(aula => {
        $(".modal-aulas-scroll").append(`
            <section class="aula">
                <article>
                    <div class="line-one">
                        <p>Salon: <span>${aula.nom_aula}</span></p> 
                        <button id="editar-aula" onclick="editarAulas(${aula.id}, ${laboratorio.id})">
                            <img src="build/img/editar.webp">
                        </button>
                    </div>
                    <p>Capacidad: <span class="blue-dark">${aula.capacidad_aula}</span></p>
                    <p>Horarios: <span>7:00 am</span> - <span>7:00pm</span></p>
                    <!-- Van a ir marcado los dias en el que se ocupa el aula -->
                    <div class="dias">
                        <button class="btn-dias selected">L</button>
                        <button class="btn-dias">M</button>
                        <button class="btn-dias">M</button>
                        <button class="btn-dias">J</button>
                        <button class="btn-dias">V</button>
                    </div>
                </article>
            </section>
        `)
    })
}
function infoModalAula(){
    $("main").append(
        `<div class="modal-overlay add-info-aulas" id="overlay-aulas-2">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <h4 class="blue-dark bold center">Añade información acerca del laboratorio</h4>
                <div class="text-area">
                    <textarea></textarea>
                </div>
                <div class="btn-img">
                    <button>
                        <img src="build/img/ready.webp">
                    </button>
                </div>
            </div>
        </div>`
    );
}

function addAula(id){
    $("main").append(`
    <div class="modal-overlay add-aula" id="overlay-aulas-3">
        <div class="modal-form">
            <div class="btn-img">
                <button id="btn-cerrar-modal" onclick="removeModal()">
                    <img src="build/img/icono-x.webp">
                </button>
            </div>
            <div class="form-add">
                <div class="campo-add">
                    <label class="blue-dark bold" for="nombre">Nombre del aula:</label>
                    <input placeholder="Nombre del aula" type="text" name="nombre" id="nombre">
                </div>
                <div class="campo-add">
                    <label class="blue-dark bold" for="capacidad">Capacidad:</label>
                    <input class="" type="number" name="capacidad" min="0" id="capacidad">
                </div>
                
            </div>
            <div class="btn-add-aula">
                <button class="btn-principal" onclick="guardarAula(${id})">Añadir</button>
            </div>
        </div>
    </div>
    `);
}
async function editarAulas(id, id_lab){
    const aula = await get(`laboratorio/aula?id=${id}`)
    $("main").append(`
        <div class="modal-overlay add-aula" id="overlay-aulas-3">
            <div class="modal-form">
                <div class="btn-img">
                    <button id="btn-cerrar-modal" onclick="removeModal()">
                        <img src="build/img/icono-x.webp">
                    </button>
                </div>
                <div class="form-add">
                    <div class="campo-add">
                        <label class="blue-dark bold" for="nombre">Nombre del aula:</label>
                        <input placeholder="Nombre del aula" type="text" name="nombre" id="nombre" value="${aula.nom_aula}">
                    </div>
                    <div class="campo-add">
                        <label class="blue-dark bold" for="capacidad">Capacidad:</label>
                        <input class="" type="number" name="capacidad" min="0" id="capacidad" value="${aula.capacidad_aula}">
                    </div>
                </div>
                <div class="btn-add-aula">
                    <button class="btn-principal" onclick="actalizarAula(${aula.id}, ${id_lab})">Actualizar</button>
                </div>
                <div class="btn-eliminar-aula">
                    <button class="btn-enlace" onclick="eliminarAula(${aula.id})">Eliminar</button>
                </div>
            </div>
        </div>
    `);
}
function removeModal() {	
	$("main").children().last().remove();
}