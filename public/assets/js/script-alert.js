function showAlert(message, type = 'info', duration = 4000) {
    const alertBox = document.getElementById('custom-alert');
    const alertMessage = document.getElementById('alert-message');
    const progressBar = document.getElementById('alert-progress');

    if (!alertBox || !alertMessage || !progressBar) {
      console.warn("❌ Alert box elements not found!");
      return;
    }

    alertBox.className = `alert ${type}`;
    alertMessage.textContent = message;

    progressBar.style.transition = 'none';
    progressBar.style.transform = 'scaleX(1)';
    void progressBar.offsetWidth;
    progressBar.style.transition = `transform ${duration}ms linear`;
    progressBar.style.transform = 'scaleX(0)';

    alertBox.classList.remove('hidden');
    alertBox.classList.add('show');

    setTimeout(() => {
      alertBox.classList.remove('show');
      setTimeout(() => {
        alertBox.classList.add('hidden');
      }, 500);
    }, duration);
  }
