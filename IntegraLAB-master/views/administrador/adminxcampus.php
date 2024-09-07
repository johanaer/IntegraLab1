<?php
  // Verificar si se debe mostrar el modal de notificación
  if (isset($_GET['notification']) && $_GET['notification'] === 'asuccess') {
     $notificationMessage = "Registro guardado correctamente";
     $notification = "on";
  } elseif(isset($_GET['notification']) && $_GET['notification'] === 'esuccess'){
    $notificationMessage = "Registro actualizado correctamente";
    $notification = "on";
  } elseif(isset($_GET['notification']) && $_GET['notification'] === 'dsuccess'){
    $notificationMessage = "Registro eliminado correctamente";
    $notification = "on";
  } elseif(isset($_GET['notification']) && $_GET['notification'] === 'error'){
    $notificationMessage = "Error al realizar la operación";
    $notification = "on";
  }
  else{
    $notificationMessage = " ";
    $notification = "off";
  }
?>
<script src="/build/js/adminxcampus.js"></script>
<link rel="stylesheet" href="/build/css/adminxcampus.css" type="text/css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<body onload="showNotificationModal('<?php echo $notificationMessage; ?>','<?php echo $notification; ?>')">

  <img src="/build/img/LOGO_TECNM_BLANCO.webp" alt="Logo TecNMAZUL" class="logo">
  <img src="/build/img/logoIL-removebg-preview.png" alt="Logo TecNMAZUL" class="logo-derecha">

  <!-- <br><br><br> -->
  <div class="btn-img">
      <button id="btn-cerrar-modal" onclick="cerrarSesion()">
          <img src="build/img/volver.webp">
      </button>
  </div>
  <h1>IntegraLAB</h1>
  <br>
  <!-- <h2>Hola</h2> -->
  <h2>¡Bienvenido!</h2>

  <!-- CARGAR CADA TARJETA -->
  <div class="card-container">
    <?php
    if ($laboratorios) {
        foreach($laboratorios as $laboratorio) {
          echo '<div class="card" data-id="' . $laboratorio->id . '">';
          echo '<p><strong>Laboratorio:</strong> ' . $laboratorio->nom_lab . '</p>';
          echo '<p><strong>Descripción:</strong> ' . substr($laboratorio->descripcion_laboratorio, 0, 30) . '</p>';
          foreach($usuarios as $usuario) {
            if($laboratorio->id_encargado == $usuario->id) {
              echo '<p><strong>Encargado:</strong> ' . $usuario->nom_usuario . '</p>';
              echo '<p><strong>Email:</strong> ' . $usuario->correo_usuario . '</p>';
            }
          }
          echo '</div>';
        }
    } else {
        echo "<h3>No se encontraron laboratorios.</h3>";
        echo "Presiona Registrar para agregar un nuevo laboratorio.";
    }
    ?>
  </div>


  <!-- Botón Registrar -->
  <button class="boton-registro">Registro</button>

  <!-- Modal Registro -->
  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Registro</h2>
      <form method="POST" action="/laboratorio/guardar">
        <label for="laboratorio">Laboratorio:</label>
        <input type="text" id="laboratorio" name="nom_lab" maxlength="30" required>
        <label for="descripcion">Descripción:</label>
        <textarea type="text" id="descripcion" name="descripcion_laboratorio" maxlength="150" rows="3" cols="30" required></textarea>
        <!-- <br> -->
        <label for="campus">Campus:</label>
        <select id="campus" name="id_campus">
          <?php
          if ($campus) {
            foreach($campus as $campu) {
              echo '<option value="' . $campu->id . '">' . $campu->nom_campus . '</option>';
            }
          } else {
            echo '<option value="">No se encontraron campus</option>';
          }
          ?>
        </select>
        <br><br>
        <label for="encargado">Encargado:</label>
        <select id="encargado" name="id_encargado">
          <?php
          if ($usuarios) {
            foreach($usuarios as $usuario) {
              echo '<option value="' . $usuario->id . '">' . $usuario->nom_usuario . '</option>';
            }
          } else {
            echo '<option value="">No se encontraron usuarios</option>';
          }
          ?>
        </select>
        <br><br>
        <button type="submit" name="submit" class="submit">Agregar</button>
      </form>
    </div>

  </div>

  <!-- Modal Editar -->
  <div id="emodal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Editar Laboratorio</h2>
      <form method="POST" action="/laboratorio/editar">
        <label for="eidlab">ID Laboratorio:</label>
        <input type="text" id="eidlab" name="eidlab" readonly>      
        <!-- <br> -->
        <label for="elaboratorio">Laboratorio:</label>
        <input type="text" id="elaboratorio" name="elaboratorio" maxlength="30" required>
        <label for="edescripcion">Descripción:</label>
        <textarea type="text" id="edescripcion" name="edescripcion" maxlength="150" rows="3" cols="30" required></textarea>
        <label for="ecampus">Campus:</label>
        <select id="ecampus" name="ecampus">
          <?php
          if ($campus) {
            foreach($campus as $campu) {
              echo '<option value="' . $campu->id . '">' . $campu->nom_campus . '</option>';
            }
          } else {
            echo '<option value="">No se encontraron campus</option>';
          }
          ?>
        </select>
        <br><br>
        <label for="eencargado">Encargado:</label>
        <select id="eencargado" name="eencargado">
          <?php
          if ($usuarios) {
            foreach($usuarios as $usuario) {
              echo '<option value="' . $usuario->id . '">' . $usuario->nom_usuario . '</option>';
            }
          } else {
            echo '<option value="">No se encontraron usuarios</option>';
          }
          ?>
        </select>
        <br><br>
        <div class="modal-buttons">
          <button type="esubmit" name="esubmit" class="submit">Editar</button>
          <button type="button" id="eliminar" class="eliminar">Eliminar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- modal eliminar inicio -->
  <div id="eliminarModal" class="modal">
    <div class="modal-content">
      <h2>Confirmar Eliminación</h2>
      <p>¿Estás seguro de que deseas eliminar este laboratorio?</p>
      <div class="modal-buttons">
        <button id="cancelarEliminar" class="submit">Cancelar</button>
        <button id="confirmarEliminar" class="eliminar">Eliminar</button>
      </div>
    </div>
  </div>
  <!-- modal eliminar fin -->

  <!-- inicio modal notificacion -->

  <div id="notification-modal" class="modal" style="display: none;">
    <div class="modal-content">
      <h2 id="notification-message"></h2>
      <button id="close-notification">Cerrar</button>
    </div>
  </div>

  <!-- fin modal notificacion -->

  <!-- Script JS -->
  <script>
      // Obtener referencia al modal de notificación y al botón de cierre
  var notificationModal = document.getElementById("notification-modal");
  // Obtener el mensaje de notificación
  const notificationMessage = document.getElementById("notification-message");
  var closeNotificationBtn = document.getElementById("close-notification");
  
  
  // Función para mostrar el modal de notificación con un mensaje
  function showNotificationModal(message, notification) {
    if(document.getElementById("notification-message")) {
      document.getElementById("notification-message").textContent = message;
      if (notification == "on"){
        notificationModal.style.display = "block";
      }else{
        notificationModal.style.display = "none";
      }
    }
  }
  
  // Función para cerrar el modal de notificación
  function closeNotificationModal() {
    notificationModal.style.display = "none";
    window.location.href = "http://localhost:1000/adminxcampus";
  }
  
  // Asignar evento al botón de cierre del modal
  if(closeNotificationBtn) {
    closeNotificationBtn.addEventListener("click", closeNotificationModal);
  }
  // closeNotificationBtn.addEventListener("click", closeNotificationModal);
  </script>

</body>

</html>
