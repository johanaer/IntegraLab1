document.addEventListener('DOMContentLoaded', function () {
  var botonRegistro = document.querySelector('.boton-registro');
  var modal = document.querySelector('.modal');
  var emodal = document.getElementById("emodal");
  var closeBtna = document.querySelector("#modal .close");
  var closeBtne = document.querySelector("#emodal .close");
  
  // Obtener todas las tarjetas
  var tarjetas = document.querySelectorAll(".card");
  
  // Variable para almacenar la tarjeta actualmente seleccionada
  var tarjetaSeleccionada = null;
  
  //Botón registro que muestra el modal agregar
  if(botonRegistro) {
    botonRegistro.addEventListener('click', function() {
      modal.style.display = "block";
    });
  }
  
  //Cierra el modal agregar si se presiona fuera de él
  // modal.addEventListener('click', function(event) {
  //   if (event.target === modal) {
  //     modal.style.display = "none";
  //   }
  // });
  
  //Cierra el modal editar si se presiona fuera de él 
  // emodal.addEventListener('click', function(event) {
  //   if (event.target === emodal) {
  //     emodal.style.display = "none";
  //   }
  // });
  
  // Agregar evento de clic a cada tarjeta
  tarjetas.forEach((tarjeta) => {
    tarjeta.addEventListener("click", () => {
      emodal.style.display = "block";
      tarjetaSeleccionada = tarjeta;
    });
  });
  
  // // Agregar evento de clic al elemento de cierre del emodal
  // closeBtne.addEventListener("click", () => {
  //   emodal.style.display = "none";
  //   tarjetaSeleccionada = null;
  // });
  
  
  //  ------------------------ EDITAR TARJETA DE LABORATORIO ----------------------------
  // Obtener referencia al modal y sus campos
  // const emodal1 = document.getElementById("emodal");
  const eidlabInput = document.getElementById("eidlab");
  const elabInput = document.getElementById("elaboratorio");
  const edesInput = document.getElementById("edescripcion");
  const ecampusInput = document.getElementById("ecampus");
  const eencargadoInput = document.getElementById("eencargado");
  
  // Obtener referencias a todas las tarjetas
  const cards = document.getElementsByClassName("card");
  
  // Agregar evento de clic a cada tarjeta
  for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    card.addEventListener("click", async function() {
      // Obtener el ID del laboratorio desde el atributo data-id
      const labID = card.getAttribute("data-id");
  
      // Realizar la petición AJAX al servidor para obtener los datos del laboratorio
      const laboratorios = await get("laboratorio/obtener/encargado?id=" + labID)
      const encargados = await get(`laboratorio/encargado/ver?id=${laboratorios.id_encargado}`)

        // Llenar los campos del modal con los datos obtenidos
          eidlabInput.value = labID;
          elabInput.value = laboratorios.nom_lab; // Reemplaza con la propiedad que contiene el nombre del laboratorio en el objeto JSON retornado
          edesInput.value = laboratorios.descripcion_laboratorio;
          eencargadoInput.value = encargados.id; // Reemplaza con la propiedad que contiene el nombre del encargado en el objeto JSON retornado
          ecampusInput.value = laboratorios.id_campus; // Reemplaza con la propiedad que contiene el nombre del campus en el objeto JSON retornado
  
          // Mostrar el modal
          emodal.style.display = "block";
    });
  }
  
  // Agregar evento de clic al botón de cierre del modal
  if(closeBtne) {

    closeBtne.addEventListener("click", function() {
      // Ocultar el modal al hacer clic en el botón de cierre
      emodal.style.display = "none";
    });
  }
  if(closeBtna) {

    closeBtna.addEventListener("click", function() {
      // Ocultar el modal al hacer clic en el botón de cierre
      modal.style.display = "none";
    });
  }
  
  //  ------------------------ ELIMINAR TARJETA DE LABORATORIO ----------------------------
  
  // Obtener el botón de eliminar del modal
  var eliminarBtn = document.getElementById("eliminar");
  
  // Obtener el modal de eliminación
  const eliminarModal = document.getElementById("eliminarModal");
  // Obtener los botones de cancelar y confirmar eliminar
  const cancelarEliminarBtn = document.getElementById("cancelarEliminar");
  const confirmarEliminarBtn = document.getElementById("confirmarEliminar");
  
  
  // Evento de clic en el botón de eliminar en el modal de edición
  if(eliminarBtn) {
    eliminarBtn.addEventListener("click", () => {
      // Mostrar el modal de eliminación
       eliminarModal.style.display = "block";
    });
  }
  
  // Evento de clic en el botón de cancelar eliminar
  if(cancelarEliminarBtn) {
    cancelarEliminarBtn.addEventListener("click", () => {
      // Ocultar el modal de eliminación
      eliminarModal.style.display = "none";
    });
  }
  
  // Agregar evento de clic al botón de eliminar del modal
  //eliminarBtn.addEventListener("click", function() {
  if(confirmarEliminarBtn) {
    confirmarEliminarBtn.addEventListener("click", async function() {
      if (tarjetaSeleccionada) {
        // Obtener el ID del laboratorio desde el atributo data-id
        const labID = tarjetaSeleccionada.getAttribute("data-id");
    
        // Realizar la petición AJAX a PHP para eliminar el registro
        // let array = [];
        // array["labID"] = labID;
        // console.log(await post("laboratorio/eliminar", array))
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/laboratorio/eliminar", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Eliminación exitosa, mostrar mensaje o realizar acciones adicionales
              location.href = "http://localhost:1000/adminxcampus?notification=dsuccess";
            } else {
              // Error en la eliminación, mostrar mensaje o realizar acciones adicionales
              location.href = "http://localhost:1000/adminxcampus?notification=error";
            }
          }
        };
        xhr.send("labID=" + encodeURIComponent(labID));
    
        // Eliminar la tarjeta visualmente
        tarjetaSeleccionada.remove();
        tarjetaSeleccionada = null;
        emodal.style.display = "none";
      }
      // Ocultar el modal de eliminación
      eliminarModal.style.display = "none";
    });
  }
});

function cerrarSesion() {
  location.href = "/login";
}