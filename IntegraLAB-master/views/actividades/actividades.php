<main class="actividades">
    <div class="sobre modal-actividades">
        <h1 class="center blue-dark bold">Actividades proximas</h1>
        <div class="todas-actividades">
            <?php foreach($actividades as $actividad): ?>
                <div class="modal-actividad">
                    <?php foreach($laboratorios as $laboratorio): ?>
                        <?php if($actividad->id_lab == $laboratorio->id): ?>
                            <h4 class="center blue-dark bold"><?php echo $laboratorio->nom_lab; ?></h4>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php foreach($aulas as $aula): ?>
                        <?php if($actividad->id_aula == $aula->id): ?>
                            <p class="center">Sala <span class="blue-dark"><?php echo $aula->nom_aula; ?></span> capacidad <span class="blue-dark"><?php echo $aula->capacidad_aula; ?></span></p>
                            <p class="center">Horario <span class="blue-dark">7:00</span> a <span class="blue-dark">8:00</span></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="btn-img">
            <form action="dashboard">
                <button>
                    <img src="build/img/volver.webp">
                </button>
            </form>
        </div>
    </div>
</main>