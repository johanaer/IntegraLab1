<main >
  <div >
    <button class="back-button back-button.active" onclick="regresar()"><img src="build/icons/reply-fill.svg" width="50" height="50"></button>
    <h1 class="title">Reservación</h1>
    <h2 class="subtitle">Elija un laboratorio</h2>
    <div class="select-reservacion">
        <select name="laboratorio" id="selectLaboratorio" class="select-items">
            <option selected disabled>Laboratorio</option>
            <?php foreach($laboratorios as $laboratorio): ?>
                <option class="dropdown-item" value="<?php echo $laboratorio->id;?>"><?php echo $laboratorio->nom_lab; ?></option>
            <?php endforeach; ?>
        </select>
        <select id="selectedAula" name="aula" class="select-items">
            <option selected disabled value="0">Aula</option>
        </select>
    </div>
    <div class="day-buttons">
      <button class="round-button" onclick="cambiarDia(this)" value="1">L</button>
      <button class="round-button" onclick="cambiarDia(this)" value="2">M</button>
      <button class="round-button" onclick="cambiarDia(this)" value="3">M</button>
      <button class="round-button" onclick="cambiarDia(this)" value="4">J</button>
      <button class="round-button" onclick="cambiarDia(this)" value="5">V</button>
    </div>
    <div class="time-inputs">
      <input type="time" class="time-input" value="00:00" id="hora_inicio">
      <span class="separator"> a </span>
      <input type="time" class="time-input" value="00:00" id="hora_fin">
    </div>
    <button class="botonmaterial botonmaterial.active" id="open-popup" onclick="mostrarMateriales()">Materiales</button>
    <ul id="center-content" class="scrollable-list"></ul>
    <button class="verify-button" onclick="validarHorario()">Verificar horario</button>
    <button class="reserve-button" onclick="reservar()">Reservar</button>
  </div>
  <script src="build/js/reservacion.js"></script>
</main>