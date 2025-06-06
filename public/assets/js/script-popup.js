function toggleDropdown() {
    const dropdownMenu = document.getElementById('userDropdownMenu');
    dropdownMenu.classList.toggle('active');
}

document.addEventListener('click', (event) => {
    const dropdownMenu = document.getElementById('userDropdownMenu');
    const dropdownButton = document.getElementById('userDropdownButton');
    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.remove('active');
    }
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".logout-notification").forEach(el => {
        el.style.display = "none";
    });

    document.querySelectorAll("[data-action='confirm-logout']").forEach(btn => {
        btn.addEventListener("click", function () {
            const targetId = this.dataset.target || "logout-notification";
            const modal = document.getElementById(targetId);
            if (modal) modal.style.display = "flex";
        });
    });

    document.querySelectorAll("[data-action='cancel-logout']").forEach(btn => {
        btn.addEventListener("click", function () {
            const modal = this.closest(".logout-notification");
            if (modal) modal.style.display = "none";
        });
    });

    document.querySelectorAll("[data-action='open-modal']").forEach(item => {
        item.addEventListener("click", function () {
            const targetId = this.dataset.target;
            openModal(targetId);
        });
    });

    window.addEventListener("click", function (e) {
        document.querySelectorAll(".modal, .logout-notification").forEach(modal => {
            if (e.target === modal) modal.style.display = "none";
        });
    });
});
