document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('login-form');
    const loadingScreen = document.getElementById('loading-screen');

    if (form) {
        form.addEventListener('submit', function () {
            loadingScreen.style.display = 'flex';
        });
    }
});
