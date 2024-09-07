(function() {
    $("#actividades").on("click", () => {
        location.href = "/actividades";
    })

    $("#laboratorios").on("click", () => {
        location.href = "/laboratorio";
    })

    $("#calendario").on("click", () => {
        location.href = "/calendario";
    })

    $("#eventos").on("click", () => {
        location.href = "/eventos";
    })

    $("#historial").on("click", () => {
        location.href = "/historial";
    })

    $("#reportes").on("click", () => {
        location.href = "/reportes";
    })
    
    $("#reservaciones").on("click", () => {
        location.href = "/reservacion";
    });

    $("#quejas").on("click", () => {
        location.href = "/quejas";
    });
})();