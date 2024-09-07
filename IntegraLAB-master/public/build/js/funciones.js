// Obtener referencias a los elementos del DOM
const openPopupButton = document.getElementById('open-popup');
const closePopupButton = document.getElementById('close-popup');
const saveMaterialsButton = document.getElementById('save-materials');
const popupContainer = document.getElementById('popup-container');
const materialList = document.getElementById('material-list');
const centerContentList = document.getElementById('center-content');

// Función para abrir la ventana flotante
function openPopup() {
  popupContainer.style.display = 'block';
}

// Función para cerrar la ventana flotante
function closePopup() {
  popupContainer.style.display = 'none';
}

// Función para guardar los materiales en la lista
function saveMaterials() {
  const materials = materialList.querySelectorAll('li');

  materials.forEach((material) => {
    const image = material.querySelector('img').getAttribute('src');
    const input = material.querySelector('input.material-input').value;
    const number = material.querySelector('span.material-number').innerText;

    const listItem = document.createElement('li');
    listItem.innerHTML = `
      <div class="item">
        <div class="left-content">
          <img src="${image}" alt="Material">
        </div>
        <div class="center-content">
          <input type="text" class="text-input" value="${input}">
        </div>
        <div class="right-content">
          <input type="text" class="number-input" value="${number}">
        </div>
      </div>
    `;

    centerContentList.appendChild(listItem);
  });

  closePopup();
}

// Agregar event listeners
openPopupButton.addEventListener('click', openPopup);
closePopupButton.addEventListener('click', closePopup);
saveMaterialsButton.addEventListener('click', saveMaterials);
 
