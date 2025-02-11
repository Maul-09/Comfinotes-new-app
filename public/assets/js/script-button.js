function toggleDropdown() {
    const dropdownMenu = document.getElementById('userDropdownMenu');
    dropdownMenu.classList.toggle('active');
}

function confirmLogout() {
    const confirmAction = confirm('Are you sure you want to logout?');
    if (confirmAction) {
        alert('Logging out...');
    }
}

document.addEventListener('click', (event) => {
    const dropdownMenu = document.getElementById('userDropdownMenu');
    const dropdownButton = document.getElementById('userDropdownButton');
    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.remove('active');
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const notifIcon = document.getElementById("icon-notif");
    const notifDropdown = document.getElementById("notif-dropdown");

    notifIcon.addEventListener("click", function () {
      if (notifDropdown.style.display === "block") {
        notifDropdown.style.display = "none";
      } else {
        notifDropdown.style.display = "block";
      }
    });

    document.addEventListener("click", function (event) {
      if (!notifIcon.contains(event.target) && !notifDropdown.contains(event.target)) {
        notifDropdown.style.display = "none";
      }
    });
  });



document.querySelectorAll(".toggle-password").forEach(toggle => {
    toggle.addEventListener("click", function(){
        const passwordField = this.previousElementSibling;

        if (passwordField.type === "password") {
            passwordField.type = "text";
            this.setAttribute("icon", "proicons:eye");
        } else {
            passwordField.type = "password";
            this.setAttribute("icon", "proicons:eye-off");
        }
    });
})
