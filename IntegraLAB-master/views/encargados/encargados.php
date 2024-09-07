<main>
    <div class="encargados">
        <div class="modal-encargados">
            <h1 class="blue-dark bold">Encargados</h1>
            <h3 class="blue-dark bold"><?php echo $laboratorio->nom_lab; ?></h3> <!-- Va el departameneto correspondiente -->
            <h1 class="blue-dark bold">Tecnlogico Nacional de Mexico, campus <?php echo $campus->nom_campus; ?></h1> <!-- Va el tec correspondiente -->
            <h2 class="blue-dark bold">Bienvenido</h2>
            <div class="user">
                <img src="build/img/user.webp" id="btn-view-user" onclick="mostrarUser(<?php echo $usuario->id; ?>)">
                <p><?php echo $usuario->nom_usuario; ?></p>
            </div>
            <div class="btns-acciones">
                <button class="btn-secundario" id="btn-aulas" onclick="mostrarAulas(<?php echo $laboratorio->id ?>)">Aulas</button>
                <button class="btn-secundario" id="btn-profesores" onclick="mostrarProfesor(<?php echo $laboratorio->id ?>)">Profesores</button>
                <button class="btn-secundario" id="btn-materiales" onclick="mostrarMateriales(<?php echo $laboratorio->id ?>)">Materiales</button>
            </div>
            <div class="cerrar-sesion">
                <button class="btn-principal" onclick="cerrarSesion()">Cerrar sesion</button>
            </div> 
        </div>
    </div>
</main>
<script src="/build/js/encargados_front.js"></script>
<script src="/build/js/encargados_back.js"></script>