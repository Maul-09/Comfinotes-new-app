function confirmLogout() {
    const notification = document.getElementById("logout-notification");
    if (notification) {
      notification.style.display = "flex";
    }
  }
  
  function proceedLogout() {
    alert("You have logged out.");
    const notification = document.getElementById("logout-notification");
    if (notification) {
      notification.style.display = "none";
    }
  
  }
  
  function cancelLogout() {
    const notification = document.getElementById("logout-notification");
    if (notification) {
      notification.style.display = "none";
    }
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    const notification = document.getElementById("logout-notification");
    if (notification) {
      notification.style.display = "none";
    }
  });
  
  
  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'flex';
    }
  }
  
  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
  }
  
  window.onclick = function (event) {
    const modal = document.querySelector('.modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
  };
  
  
  