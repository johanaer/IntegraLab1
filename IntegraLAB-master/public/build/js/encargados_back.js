async function guardarMaterial(id) {
    let newArray = [];
    if(!$("#imagen")[0].files[0]) {
        alerta("error", "No ha seleccionado una imagen");
        return;
    }
    if(!$("#nombre")[0].value) {
        alerta("error", "Nombre vacio");
        return;
    }
    if(!$("#cantidad")[0].value) {
        alerta("error", "Cantidad vacia o no es un numero");
        return;
    }
    newArray["nom_material"] = $("#nombre")[0].value;
    newArray["existencia_material"] = $("#cantidad")[0].value;
    newArray["imagen"] = $("#imagen")[0].files[0];
    newArray["id_lab"] = id;
    const respuesta = await post("laboratorio/material/crear", newArray);
    if(respuesta.resultado) {
        alerta("success", "Material agregado correctamente");
        removeModal();
        removeModal();
    }
}

async function actualizarMaterial(id, id_lab) {
    let newArray = [];
    if(!$("#nombre")[0].value) {
        alerta("error", "Nombre vacio");
        return;
    }
    if(!$("#cantidad")[0].value) {
        alerta("error", "Cantidad vacia o no es un numero");
        return;
    }
    newArray["nom_material"] = $("#nombre")[0].value;
    newArray["existencia_material"] = $("#cantidad")[0].value;
    newArray["imagen"] = $("#imagen")[0].files[0] ?? "";
    newArray["id_lab"] = id_lab;
    newArray["id"] = id;
    const respuesta = await post("laboratorio/material/actualizar", newArray);
    if(respuesta.resultado) {
        alerta("success", "Material actualizado correctamente");
        removeModal();
        removeModal();
    }
}

async function eliminarMaterial(id) {
    let newArray = [];
    newArray["id_material"] = id;
    if(await confirmAlert()) {
        const respuesta = await post("laboratorio/material/eliminar", newArray);
        if(!respuesta.code) {
            alerta("success", "Material eliminado correctamente");
            removeModal();
            removeModal();
        } else {
            alerta("error", respuesta.message);
        }
    }
}

async function guardarAula(id) {
    if(!$("#nombre")[0].value) {
        alerta("error", "Nombre vacio");
        return;
    }
    if(!$("#capacidad")[0].value) {
        alerta("error", "Capacidad vacia o no es un numero");
        return;
    }
    let args = [];
    args["nom_aula"] = $("#nombre")[0].value;
    args["capacidad_aula"] = $("#capacidad")[0].value;
    args["id_lab"] = id;
    const respuesta = await post("laboratorio/aulas/guardar", args);
    if(respuesta.resultado) {
        alerta("success", "Aula agregada correctamente");
        removeModal();
        removeModal();
    }
}

async function actalizarAula(id, id_lab) {
    if(!$("#nombre")[0].value) {
        alerta("error", "Nombre vacio");
        return;
    }
    if(!$("#capacidad")[0].value) {
        alerta("error", "Capacidad vacia o no es un numero");
        return;
    }
    let args = [];
    args["id"] = id;
    args["nom_aula"] = $("#nombre")[0].value;
    args["capacidad_aula"] = $("#capacidad")[0].value;
    args["id_lab"] = id_lab;
    const respuesta = await post("laboratorio/aulas/actualizar", args);
    if(respuesta.resultado) {
        alerta("success", "Aula actualizada correctamente");
        removeModal();
        removeModal();
    }
}

async function eliminarAula(id) {
    let args = [];
    args["id_aula"] = id;
    if(await confirmAlert()) {
        const respuesta = await post("laboratorio/aula/eliminar", args);
        if(!respuesta.code) {
            alerta("success", "Aula eliminado correctamente");
            removeModal();
            removeModal();
        } else {
            alerta("error", respuesta.message);
        }
    }
}

async function actualizarUsuario(id) {
    if(!$("#nombre")[0].value) {
        alerta("error", "Nombre vacio");
        return;
    }
    if(!$("#password")[0].value) {
        alerta("error", "Password vacio");
        return;
    }
    let args = [];
    args["id"] = id;
    args["nom_usuario"] = $("#nombre")[0].value;
    args["pass_usuario"] = $("#password")[0].value;
    const respuesta = await post("usuario/actualizar", args);
    if(respuesta.resultado) {
        alerta("success", "Usuario actualizado correctamente");
        removeModal();
        removeModal();
    }
}

async function agregarProfesor(id) {
    if(!$("#nombre")[0].value) {
        alerta("error", "Nombre vacio");
        return;
    }
    if(!$("#email")[0].value) {
        alerta("error", "Correo vacio");
        return;
    }
    if(!$("#password")[0].value) {
        alerta("error", "Password vacio");
        return;
    }
    let args = [];
    args["id_lab"] = id;
    args["nom_usuario"] = $("#nombre")[0].value;
    args["correo_usuario"] = $("#email")[0].value;
    args["pass_usuario"] = $("#password")[0].value;
    const respuesta = await post("usuario/agregar", args);
    if(respuesta.resultado) {
        alerta("success", "Profesor agregado correctamente");
        removeModal();
        removeModal();
    }
}

async function actualizarProfesor(id) {
    if(!$("#nombre")[0].value) {
        alerta("error", "Nombre vacio");
        return;
    }
    if(!$("#email")[0].value) {
        alerta("error", "Correo vacio");
        return;
    }
    if(!$("#password")[0].value) {
        alerta("error", "Password vacio");
        return;
    }
    let args = [];
    args["id"] = id;
    args["nom_usuario"] = $("#nombre")[0].value;
    args["correo_usuario"] = $("#email")[0].value;
    args["pass_usuario"] = $("#password")[0].value;
    const respuesta = await post("usuario/actualizar", args);
    if(respuesta.resultado) {
        alerta("success", "Usuario actualizado correctamente");
        removeModal();
        removeModal();
        removeModal();
    }
}

function cerrarSesion() {
    location.href = "/login";
}

/*
    <div class="campo-add">
        <label class="blue-dark bold" for="horario">Horarios:</label>
        <div class="btns-dias"> 
            <button type="button" value="1" name="Lunes">L</button>
            <button type="button" value="2" name="Martes">M</button>
            <button type="button" value="3" name="Miercoles">M</button>
            <button type="button" value="4" name="Jueves">J</button>
            <button type="button" value="5" name="Viernes">V</button>
        </div>
    </div>
    <!-- Cambio de panel por cada boton -->
    <div class="panel-horario-add">
        <input type="time" id="time">
        <p>a</p>
        <input type="time" id="time">
    </div>
*/