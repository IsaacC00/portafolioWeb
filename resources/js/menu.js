const btn = document.querySelector(".mobile-menu");
const sidebar = document.querySelector(".sidebar");

// Función para actualizar el estado del sidebar en el localStorage
const updateSidebarState = (isOpen) => {
  localStorage.setItem('isSidebarOpen', isOpen);
};

// Evento para alternar la visibilidad del sidebar
btn.addEventListener("click", () => {
  sidebar.classList.toggle("-translate-x-full");
  // Actualiza el estado del sidebar en localStorage
  const isOpen = !sidebar.classList.contains("-translate-x-full");
  updateSidebarState(isOpen);
});

// Función para inicializar el estado del sidebar al cargar la página
const initializeSidebar = () => {
  const isSidebarOpen = localStorage.getItem('isSidebarOpen') === 'true';
  if (isSidebarOpen) {
    sidebar.classList.remove("-translate-x-full");
  } else {
    sidebar.classList.add("-translate-x-full");
  }
};

// Llamar a la función al cargar la página
document.addEventListener("DOMContentLoaded", initializeSidebar);