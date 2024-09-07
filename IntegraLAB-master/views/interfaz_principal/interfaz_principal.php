<header>
    <div class="nav-dashboard">
        <div class="logo-tecnm">
            <img src="build/img/LOGO_TECNM_BLANCO.webp">
        </div>
        <div class="logo-integraLAB">
            <img src="build/img/logo_integraLAB.webp">
        </div>
    </div>
</header>
<main >
    <div class="dashboard">
        <h1 class="blue-dark center bold">Hola ¡Bienvenido!</h1>
        <div class="user-dashboard">
            <p class="blue-dark bold uppercase"><?php echo $usuario->nom_usuario ?></p>
            <img src="build/img/ICONO_USUARIO_IP.webp">
        </div>
        <div class="carrusel">
            <div class="carrusel-items">
                <!-- Actividades -->
                <section class="carrusel-item" id="actividades">
                    <article>
                        <div class="logo-titulo">
                            <img src="build/img/icono_actividades.webp">
                            <p class="white center">Actividades</p>
                        </div>
                        <div class="descripcion">
                            <p class="white center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </article>
                </section>
                <!-- Laboratorio -->
                <section class="carrusel-item" id="laboratorio">
                    <article>
                        <div class="logo-titulo">
                            <img src="build/img/icono_laboratorio.webp">
                            <p class="white center">Laboratorio</p>
                        </div>
                        <div class="descripcion">
                            <p class="white center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </article>
                </section>
               <!-- Calendario -->
                <section class="carrusel-item" id="calendario">
                    <article>
                        <div class="logo-titulo">
                            <img src="build/img/icono_calendario.webp">
                            <p class="white center">Calendario</p>
                        </div>
                        <div class="descripcion">
                            <p class="white center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </article>
                </section>
            </div>
        </div>
        <div class="bienvenida-profesor">
            <p class="center blue-dark">Hola profesor, si desea reservar un laboratorio en especifico puedes dar clic en el siguiente boton</p>
        </div>
        <div class="realizar-programacion">
            <form action="reservacion">
                <button class="btn-principal" id="reservaciones" type="submit">Hacer programacion</button>
            </form>
        </div>
    </div>
</main>
<script src="build/js/dashboard_opciones.js"></script>
            