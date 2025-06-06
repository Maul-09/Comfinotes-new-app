document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('[data-action="toggle-dropdown"]').forEach(trigger => {
        trigger.addEventListener("click", function (e) {
            e.stopPropagation();
            const targetId = this.getAttribute("data-target");
            const dropdown = document.getElementById(targetId);

            if (dropdown) {
                const isVisible = getComputedStyle(dropdown).display === "block";
                document.querySelectorAll(".notif-dropdown").forEach(d => d.style.display = "none");
                dropdown.style.display = isVisible ? "none" : "block";
            }
        });
    });

    document.addEventListener("click", function (e) {
        document.querySelectorAll(".notif-dropdown").forEach(d => d.style.display = "none");
    });

    document.querySelectorAll('[data-action="open-modal"]').forEach(button => {
        button.addEventListener("click", function () {
            const modalId = this.getAttribute("data-target");
            const modal = document.getElementById(modalId);
            if (modal) modal.style.display = "flex";
        });
    });

    document.querySelectorAll('[data-action="close-modal"]').forEach(button => {
        button.addEventListener("click", function () {
            const modalId = this.getAttribute("data-target");
            const modal = document.getElementById(modalId);
            if (modal) modal.style.display = "none";
        });
    });

    window.addEventListener("click", function (e) {
        document.querySelectorAll(".modal").forEach(modal => {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    });
});


document.querySelectorAll(".toggle-password").forEach(toggle => {
    toggle.addEventListener("click", function () {
        const passwordField = this.previousElementSibling;
        if (passwordField && passwordField.type === "password") {
            passwordField.type = "text";
            this.setAttribute("icon", "proicons:eye");
        } else if (passwordField) {
            passwordField.type = "password";
            this.setAttribute("icon", "proicons:eye-off");
        }
    });
});

document.querySelectorAll(".button-dropdown").forEach(button => {
    button.addEventListener("click", function (event) {
        event.stopPropagation();
        const container = button.closest(".dropdown-table");
        const dropdown = container ? container.querySelector(".dropdown-content") : null;

        document.querySelectorAll(".dropdown-content").forEach(d => {
            if (d !== dropdown) d.classList.remove("show");
        });

        if (dropdown) dropdown.classList.toggle("show");
    });
});

window.addEventListener("click", function () {
    document.querySelectorAll(".dropdown-content").forEach(d => {
        d.classList.remove("show");
    });
});
