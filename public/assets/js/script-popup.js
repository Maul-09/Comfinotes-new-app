document.addEventListener("DOMContentLoaded", function () {
    // === Dropdown User ===
    (function handleDropdown() {
        const dropdownMenu = document.getElementById('userDropdownMenu');
        const dropdownButton = document.getElementById('userDropdownButton');

        if (dropdownButton && dropdownMenu) {
            dropdownButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('active');
            });

            document.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('active');
                }
            });
        }
    })();

    // === Modal Helper Functions ===
    function openModal(id) {
        document.getElementById(id)?.classList.add('active');
    }

    function closeModal(id) {
        document.getElementById(id)?.classList.remove('active');
    }

    function handleOutsideClick(modalId, triggerId) {
        const modal = document.getElementById(modalId);
        const trigger = document.getElementById(triggerId);
        document.addEventListener('click', function (event) {
            if (
                modal &&
                modal.classList.contains('active') &&
                !modal.querySelector('.modal-content-add').contains(event.target) &&
                !trigger.contains(event.target)
            ) {
                modal.classList.remove('active');
            }
        });
    }

    // === Handle Add Account Modal ===
    (function handleAddAccountModal() {
        const btn = document.getElementById('addAcountButton');
        const modalId = 'addAcount';
        if (btn) {
            btn.addEventListener('click', () => openModal(modalId));
            handleOutsideClick(modalId, 'addAcountButton');
        }
    })();

    // === Handle Add User Modal ===
    (function handleAddUserModal() {
        const btn = document.getElementById('addUserButton');
        const modalId = 'addUser';
        if (btn) {
            btn.addEventListener('click', () => openModal(modalId));
            handleOutsideClick(modalId, 'addUserButton');
        }
    })();

    // === Handle Close Buttons ===
    document.querySelectorAll('[data-action="close-popup"]').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.getAttribute('data-target');
            closeModal(id);
        });
    });

    // === Handle Logout Modal ===
    (function handleLogoutModal() {
        document.querySelectorAll(".logout-notification").forEach(el => el.style.display = "none");

        document.querySelectorAll("[data-action='confirm-logout']").forEach(btn => {
            btn.addEventListener("click", function () {
                const targetId = this.dataset.target || "logout-notification";
                document.getElementById(targetId)?.style.setProperty('display', 'flex');
            });
        });

        document.querySelectorAll("[data-action='cancel-logout']").forEach(btn => {
            btn.addEventListener("click", function () {
                this.closest(".logout-notification")?.style.setProperty('display', 'none');
            });
        });
    })();

    // === Handle Delete Confirmation Modal ===
    (function handleDeleteModal() {
        document.querySelectorAll('[data-action="confirm-delete"]').forEach(button => {
            button.addEventListener("click", function () {
                const modalId = this.dataset.target;
                const url = this.dataset.url;
                const modal = document.getElementById(modalId);
                if (modal) {
                    const form = modal.querySelector("form#deleteForm");
                    if (form) form.action = url;
                    modal.style.display = "flex";
                }
            });
        });

        window.addEventListener("click", function (e) {
            document.querySelectorAll(".modal-delete, .logout-notification").forEach(modal => {
                if (e.target === modal) modal.style.display = "none";
            });
        });
    })();
});
