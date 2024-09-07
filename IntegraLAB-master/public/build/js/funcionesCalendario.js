document.addEventListener('DOMContentLoaded', function () {
// Variables globales
let currentDate = new Date();
let selectedDate = null;

// Función para obtener el nombre del mes
function getMonthName(monthIndex) {
  const monthNames = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
  ];
  return monthNames[monthIndex];
}

// Función para renderizar el calendario
function renderCalendar(year, month) {
  const calendarBody = document.querySelector(".weeks");
  calendarBody.innerHTML = "";

  const firstDay = new Date(year, month, 1);
  const lastDay = new Date(year, month + 1, 0);
  const totalDays = lastDay.getDate();

  // Agregar días vacíos al principio del calendario
  for (let i = 0; i < firstDay.getDay(); i++) {
    const emptyDay = document.createElement("div");
    emptyDay.classList.add("day-number");
    calendarBody.appendChild(emptyDay);
  }

  // Agregar números de los días al calendario
  for (let day = 1; day <= totalDays; day++) {
    const dayElement = document.createElement("div");
    dayElement.classList.add("day-number");
    dayElement.innerText = day;

    if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
      dayElement.classList.add("current-day");
    }

    if (firstDay.getDay() === 0 || firstDay.getDay() === 6) {
      dayElement.classList.add("weekend-day");
    }

    if (selectedDate && year === selectedDate.getFullYear() && month === selectedDate.getMonth() && day === selectedDate.getDate()) {
      dayElement.classList.add("selected-day");
    }

    dayElement.addEventListener("click", function () {
      if (this.classList.contains("selected-day")) {
        this.classList.remove("selected-day");
        selectedDate = null;

        fetch("")

      } else {
        const selectedDays = document.querySelectorAll(".selected-day");
        selectedDays.forEach(function (selectedDay) {
          selectedDay.classList.remove("selected-day");
        });
        this.classList.add("selected-day");
        selectedDate = new Date(year, month, day);
      }
    });

    calendarBody.appendChild(dayElement);
  }

  // Actualizar el mes y el año en el encabezado del calendario
  document.getElementById("current-month").innerText = getMonthName(month);
  document.getElementById("current-year").innerText = year;
}

// Evento de cambio de mes
document.querySelector(".prev-month").addEventListener("click", function () {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
});

document.querySelector(".next-month").addEventListener("click", function () {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
});

// Renderizar calendario inicial
renderCalendar(currentDate.getFullYear(), currentDate.getMonth());


//***para seleccionar los dias de la semana*****

// Obtener referencia a todos los elementos .day
const daysOfWeek = document.querySelectorAll('.day-number selected-day');

// Agregar evento de clic a cada día de la semana
daysOfWeek.forEach(day => {
  day.addEventListener('click', () => {

    document.getElementById('statusC').placeholder = 'Nuevo placeholder';

    // Quitar la clase 'selected' de todos los días de la semana
    daysOfWeek.forEach(day => {
      day.classList.remove('selected');
    });

    // Agregar la clase 'selected' al día de la semana clicado
    day.classList.add('selected');
    let input = document.querySelector('input');
    input.value = 'Nuevo texto';

  });
});
})

// Define la función de clic
function onDayClick(event) {
  // Código para ejecutar cuando se hace clic en un día del calendario
  document.getElementById('id-del-input').placeholder = 'Nuevo placeholder';
}
// Asigna la función de clic al evento de clic del elemento
daysOfWeek.addEventListener('click', onDayClick);