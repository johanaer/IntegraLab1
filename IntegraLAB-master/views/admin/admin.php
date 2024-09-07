<header >
    <div class="logo-admin-registro">
        <img src="build/img/LOGO_TECNM_BLANCO.webp">
    </div>
</header>
<body>
    <main>
        <div class="admin-registro sobre">
            <div class="btn-img filter">
                <form action="dashboard">
                    <button>
                        <img src="build/img/volver.webp">
                    </button>
                </form>
            </div>
            <h1 class="center blue-dark bold">Registro de encargados de lab</h1>
            <div class="modal-registro">
                <form method="POST">
                    <div class="campo">
                        <label class="blue-dark bold" for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text">
                    </div>
                    <div class="campo">
                        <label class="blue-dark bold" for="email">Correo electronico</label>
                        <input id="email" name="email" type="email">
                    </div>
                    <div class="campo">
                        <label class="blue-dark bold" for="password">Contraseña</label>
                        <input id="password" name="password" type="password">
                    </div>
                    <div class="campo">
                        <label class="blue-dark bold" for="repeat_password">Repetir contraseña</label>
                        <input id="repeat_password" name="repeat_password" type="password">
                    </div>
                    <button type="submit" class="btn-principal">Registrar encargado de laboratorio</button>
                </form>
            </div>
        </div>
    </main>
</body>