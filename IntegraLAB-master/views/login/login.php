
<header >
    <img class="img-header" src="build/img/LOGO_TECNM_BLANCO.webp">
</header>
<main >
    <div class="login">
        <h1 class="blue-dark bold">IntegraLAB</h1>
        <div class="modal">
            <h4 class="bold">Iniciar sesión</h4>
            <form method="POST" action="./logeo">
                <div class="campo-login">
                    <img class="icono-formulario" src="build/img/user.webp">
                    <div class="formulario">
                        <label for="usuario">USUARIO</label>
                        <input type="text" name="usuario" id="usuario" placeholder="">
                    </div>
                </div>
                <div class="campo-login">
                    <img class="icono-formulario" src="build/img/clave.webp">
                    <div class="formulario">
                        <label for="usuario">CLAVE</label>
                        <input type="password" name="clave" id="clave" placeholder="">
                    </div>
                </div>
                <button class="btn-principal" name="submit" id="btn-login">INGRESAR</button>
            </form>
        </div>
        <img class="img-itq" src="build/img/logoZorro.webp">
    </div>
    <!-- <script src="/build/js/login.js"></script> -->
</main>