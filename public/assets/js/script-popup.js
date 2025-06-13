document.addEventListener("DOMContentLoaded", function () {
    const dropdownMenu = document.getElementById('userDropdownMenu');
    const dropdownButton = document.getElementById('userDropdownButton');

    if (dropdownButton) {
        dropdownButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('active');
        });

        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('active');
            }
        });
    }

    const addAcountBtn = document.getElementById('addAcountButton');
    const addAcountModal = document.getElementById('addAcount');

    if (addAcountBtn) {
        addAcountBtn.addEventListener("click", function () {
            addAcountModal.classList.add("active");
        });
    }

    document.addEventListener("click", function (event) {
        if (
            addAcountModal &&
            addAcountModal.classList.contains('active') &&
            !addAcountModal.querySelector('.modal-box').contains(event.target) &&
            !addAcountBtn.contains(event.target)
        ) {
            addAcountModal.classList.remove('active');
        }
    });

    document.querySelectorAll('[data-action="close-popup"]').forEach(btn => {
        btn.addEventListener("click", function () {
            const targetId = this.getAttribute("data-target");
            const modal = document.getElementById(targetId);
            if (modal) modal.classList.remove("active");
        });
    });
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

    document.querySelectorAll('[data-action="confirm-delete"]').forEach(button => {
        button.addEventListener("click", function () {
            const modalId = this.getAttribute("data-target");
            const dataId = this.getAttribute("data-id");
            const modal = document.getElementById(modalId);
            const url = this.getAttribute("data-url")

            if (modal) {
                const form = modal.querySelector("form#deleteForm");
                if (form && dataId) {
                    form.action = url;
                }
                modal.style.display = "flex";
            }
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
        document.querySelectorAll(".modal-delete, .logout-notification").forEach(modal => {
            if (e.target === modal) modal.style.display = "none";
        });
    });
});
