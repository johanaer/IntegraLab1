<main>
    <div class="laboratorio">
        <div class="btn-img">
            <form action="dashboard">
                <button>
                    <img src="build/img/volver.webp">
                </button>
            </form>
        </div>
        <div class="modal">
            <h1 class="bold blue-dark">Laboratorios TECNM</h1>
            <div class="contenido-laboratorio">
                <h4 id="campus" class="blue-dark bold">CAMPUS QUERETARO</h4>
                <?php foreach($laboratorios as $laboratorio): ?>
                    <div id="lab">
                        <img src="build/img/lab.webp">
                        <div class="btn-laboratorio">
                            <button class="blue-dark" type="button" onclick="verLaboratorio(<?php echo $laboratorio->id ?>)"><?php echo $laboratorio->nom_lab; ?></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<script src="build/js/laboratorios.js"></script>