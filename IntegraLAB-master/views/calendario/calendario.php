<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CALENDARIO</title>
  <link rel="shortcut icon" href="build/img/logo_integraLAB.webp" type="image/x-icon">
  <link rel="stylesheet" href="build/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="build/css/estilosCalendario.css">
  <script src="build/js/funcionesCalendario.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <div class="container-fluid">

    <button class="back-button back-button.active "><img src="build/icons/reply-fill.svg" width="50" height="50">
    </button>
    <h1 class="title">CALENDARIO</h1>
    <h2 class="subtitle">Ver horarios</h2>
    <div class="dropdowns">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Laboratorio
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">REDES</a></li>
        <li><a class="dropdown-item" href="#">LAB COMPUTO</a></li>
        <li><a class="dropdown-item" href="#">LAB QUIMICA</a></li>
      </ul>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">LR</a></li>
        <li><a class="dropdown-item" href="#">L1</a></li>
        <li><a class="dropdown-item" href="#">A</a></li>
      </ul>
      <button class="btn btn-secondary dropdown-toggle dropdown1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">LR</a></li>
        <li><a class="dropdown-item" href="#">L1</a></li>
        <li><a class="dropdown-item" href="#">A</a></li>
      </ul>
    </div>
    <div class="calendar calendar-container .calendar-day.selected ">
      <div class="calendar-header">
        <button class="scroll-button prev-month scroll-buttons-container {
                overflow: hidden;
              }
              ">&lt;</button>
        <h2 id="current-month"></h2>
        <button class="scroll-button next-month scroll-buttons-container {
                overflow: hidden;
              }
              ">&gt;</button>
        <h2 id="current-year"></h2>
      </div>
      <div class="days-of-week ">
        <div class="day">L</div>
        <div class="day">M</div>
        <div class="day">M</div>
        <div class="day">J</div>
        <div class="day">V</div>
        <div class="day weekend-dayS">S</div>
        <div class="day weekend-dayD">D</div>
      </div>
      <div class="calendar-body  ">
        <div class="weeks"></div>
      </div>
    </div>
    <div class="table-container">
      <table class="reservation-table">
              <tr>
                <td id="td1bor"><input type="text" placeholder="07:00 a 08:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="08:00 a 09:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="09:00 a 10:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="10:00 a 11:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="11:00 a 12:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="12:00 a 13:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="13:00 a 14:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="14:00 a 15:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="15:00 a 16:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="16:00 a 17:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="17:00 a 18:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="18:00 a 19:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="19:00 a 20:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>
              <tr>
                <td id="td1bor"><input type="text" placeholder="20:00 a 21:00" readonly></td>
                <td id="td2bor">Disponibilidad <input id="statusC" type="text" placeholder="Status" readonly></td>
              </tr>              
      </table>
    </div>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <script src="build/js/bootstrap.bundle.min.js"></script>
  <script src="build/js/sweetalert2.all.min.js"></script>
  <script src="build/js/funcionesCalendario.js"></script>
</body>

</html>