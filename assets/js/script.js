'use strict';



// element toggle function
const elementToggleFunc = function (elem) { elem.classList.toggle("active"); }



// sidebar variables
const sidebar = document.querySelector("[data-sidebar]");
const sidebarBtn = document.querySelector("[data-sidebar-btn]");

// sidebar toggle functionality for mobile
sidebarBtn.addEventListener("click", function () { elementToggleFunc(sidebar); });



// tools variables
const toolsItem = document.querySelectorAll("[data-tools-item]");
const modalContainer = document.querySelector("[data-modal-container]");
const modalCloseBtn = document.querySelector("[data-modal-close-btn]");
const overlay = document.querySelector("[data-overlay]");



// modal variable
const modalImg = document.querySelector("[data-modal-img]");
const modalTitle = document.querySelector("[data-modal-title]");
const modalText = document.querySelector("[data-modal-text]");



// modal toggle function
const toolsModalFunc = function () {
  modalContainer.classList.toggle("active");
  overlay.classList.toggle("active");
}



// add click event to all modal items
for (let i = 0; i < toolsItem.length; i++) {

  toolsItem[i].addEventListener("click", function () {

    modalImg.src = this.querySelector("[data-tools-avatar]").src;
    modalImg.alt = this.querySelector("[data-tools-avatar]").alt;
    modalTitle.innerHTML = this.querySelector("[data-tools-title]").innerHTML;
    modalText.innerHTML = this.querySelector("[data-tools-text]").innerHTML;

    toolsModalFunc();

  });

}

// add click event to modal close button
modalCloseBtn.addEventListener("click", toolsModalFunc);
overlay.addEventListener("click", toolsModalFunc);



// custom select variables
const select = document.querySelector("[data-select]");
const selectItems = document.querySelectorAll("[data-select-item]");
const selectValue = document.querySelector("[data-selecct-value]");
const filterBtn = document.querySelectorAll("[data-filter-btn]");

select.addEventListener("click", function () { elementToggleFunc(this); });

// add event in all select items
for (let i = 0; i < selectItems.length; i++) {
  selectItems[i].addEventListener("click", function () {

    let selectedValue = this.innerText.toLowerCase();
    selectValue.innerText = this.innerText;
    elementToggleFunc(select);
    filterFunc(selectedValue);

  });
}



// filter variables
const filterItems = document.querySelectorAll("[data-filter-item]");

const filterFunc = function (selectedValue) {

  for (let i = 0; i < filterItems.length; i++) {

    if (selectedValue === "all") {
      filterItems[i].classList.add("active");
    } else if (selectedValue === filterItems[i].dataset.category) {
      filterItems[i].classList.add("active");
    } else {
      filterItems[i].classList.remove("active");
    }

  }

}



// add event in all filter button items for large screen
let lastClickedBtn = filterBtn[0];

for (let i = 0; i < filterBtn.length; i++) {

  filterBtn[i].addEventListener("click", function () {

    let selectedValue = this.innerText.toLowerCase();
    selectValue.innerText = this.innerText;
    filterFunc(selectedValue);

    lastClickedBtn.classList.remove("active");
    this.classList.add("active");
    lastClickedBtn = this;

  });

}



// contact form variables
const form = document.querySelector("[data-form]");
const formInputs = document.querySelectorAll("[data-form-input]");
const formBtn = document.querySelector("[data-form-btn]");

// add event to all form input field
for (let i = 0; i < formInputs.length; i++) {
  formInputs[i].addEventListener("input", function () {

    // check form validation
    if (form.checkValidity()) {
      formBtn.removeAttribute("disabled");
    } else {
      formBtn.setAttribute("disabled", "");
    }

  });
}



// page navigation variables
const navigationLinks = document.querySelectorAll("[data-nav-link]");
const pages = document.querySelectorAll("[data-page]");

// add event to all nav link
for (let i = 0; i < navigationLinks.length; i++) {
  navigationLinks[i].addEventListener("click", function () {

    for (let i = 0; i < pages.length; i++) {
      if (this.innerHTML.toLowerCase() === pages[i].dataset.page) {
        pages[i].classList.add("active");
        navigationLinks[i].classList.add("active");
        window.scrollTo(0, 0);
      } else {
        pages[i].classList.remove("active");
        navigationLinks[i].classList.remove("active");
      }
    }

  });
}



function upscale(element) {
  var modal = document.getElementById("upscale");
  var img = element.querySelector("img");
  var modalImg = document.getElementById("imgupscale");
  var captionText = document.getElementById("caption-upscale");

  modal.style.display = "block";
  modalImg.src = img.src;
  captionText.innerHTML = img.alt;

  // Adiciona a classe body-no-scroll ao body
  document.body.classList.add("body-no-scroll");
}

function closeUpscale() {
  var modal = document.getElementById("upscale");
  modal.style.display = "none";

  // Remove a classe body-no-scroll do body
  document.body.classList.remove("body-no-scroll");
}

document.addEventListener("DOMContentLoaded", function () {
  // Carregar conteúdo adicional se necessário
});






// SECTION BLOG

let scrollPosition = 0;
function showContent(contentId) {
  // Salva a posição de rolagem atual
  scrollPosition = window.scrollY;

  // Esconde todos os posts
  document.getElementById('blog-posts').style.display = 'none';

  // Mostra o conteúdo completo
  document.getElementById('content').style.display = 'block';

  // Esconde todos os itens de conteúdo
  const contentItems = document.querySelectorAll('.content-item');
  contentItems.forEach(item => item.style.display = 'none');

  // Mostra o conteúdo da matéria escolhida
  document.getElementById(contentId).style.display = 'block';

  // Rola a página para o topo ao mostrar o conteúdo
  window.scrollTo(0, 0);
}

function showPosts() {
  // Mostra todos os posts
  document.getElementById('blog-posts').style.display = 'grid';

  // Esconde o conteúdo
  document.getElementById('content').style.display = 'none';

  // Restaura a posição de rolagem ao voltar
  window.scrollTo(0, scrollPosition);
}





document.addEventListener('DOMContentLoaded', () => {
  const filterButtons = document.querySelectorAll('[data-filter-btn]');
  const projectItems = document.querySelectorAll('.project-item');

  function filterProjects(category) {
    projectItems.forEach(item => {
      const itemCategory = item.getAttribute('data-category').toLowerCase(); // Converter para minúsculas para comparação
      console.log(`Item category: ${itemCategory}, Filter category: ${category}`); // Debugging
      if (category === 'all' || itemCategory === category.toLowerCase()) {
        item.style.display = 'block'; // Exibir item
      } else {
        item.style.display = 'none'; // Ocultar item
      }
    });
  }

  // Mostrar todos os projetos ao carregar a página
  filterProjects('all');

  // Adicionar eventos de clique aos botões de filtro
  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      const category = button.getAttribute('data-category');
      console.log(`Filtering category: ${category}`); // Debugging
      filterProjects(category);
      filterButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
    });
  });
});
