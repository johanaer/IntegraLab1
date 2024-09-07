async function get(url) {
    const resultado = await fetch(`http://localhost:1000/${url}`, {
        method: "GET"
    })
    return await resultado.json();
}

async function post(url, args = []) {
	const data = new FormData();
	for(let key in args) {
		data.append(key, args[key]);
	}
    const resultado = await fetch(`http://localhost:1000/${url}`, {
        method: "POST",
		body: data
    })
	const respuesta = await resultado.json();
    return respuesta;
}

$("#logout").on("click", () => {
    location.href = "/logout"
});

function alerta(tipo, message, title = '') {
	let icon = tipo;
	if (title === '') {
		switch (tipo) {
			case 'error':
				title = 'Oops...';
				break;
			case 'warning':
				title = 'Cuidado';
				break;
			case 'info':
				title = 'Atención';
				break;
			case 'question':
				title = '¿Seguro?';
				break;
			default:
				title = 'Correcto';
				icon = 'success';
				break;
		}
	}
	Swal.fire({
		icon: icon,
		title: title,
		text: message
	})
}

async function confirmAlert(tipo = 'warning', title = '¿Estás seguro?', text = 'Esta acción podría ser irreversible.', confirmText = 'Sí, confirmar.') {
	const result = await Swal.fire({
		title: title,
		text: text,
		icon: tipo,
		showCancelButton: true,
		confirmButtonColor: '#058813',
		cancelButtonColor: '#d33',
		confirmButtonText: confirmText
	});
	return result.isConfirmed;
}