function confirmLogout() {
    const notification = document.getElementById("logout-notification");
    if (notification) {
        notification.style.display = "flex";
    } else {
        console.warn("Logout notification element not found.");
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
        modal.style.display = "flex";
    } else {
        console.warn(`Modal with ID '${modalId}' not found.`);
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "none";
    }
}

window.addEventListener("click", function (event) {
    const modals = document.querySelectorAll(".modal");
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});



