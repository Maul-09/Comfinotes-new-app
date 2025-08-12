function showAlert(message, type = 'info', duration = 3000) {
  const box = document.getElementById('custom-alert');
  const title = document.getElementById('alert-title');
  const msg = document.getElementById('alert-message');
  const iconWrapper = document.getElementById('alert-icon');
  const progress = document.getElementById('alert-progress');

  box.classList.remove('show');
  iconWrapper.className = 'custom-alert-icon';

  if (type === 'success') {
    title.innerText = 'Berhasil';
    iconWrapper.classList.add('success-icon');
    iconWrapper.innerHTML = '<iconify-icon icon="mdi:check" style="color: white;"></iconify-icon>';
  } else if (type === 'error') {
    title.innerText = 'Gagal';
    iconWrapper.classList.add('error-icon');
    iconWrapper.innerHTML = '<iconify-icon icon="mdi:close" style="color: white;"></iconify-icon>';
  } else {
    title.innerText = 'Info';
    iconWrapper.classList.add('info-icon');
    iconWrapper.innerHTML = '<iconify-icon icon="mdi:information" style="color: white;"></iconify-icon>';
  }

  msg.innerText = message;
  box.classList.add('show');

  progress.style.transition = 'none';
  progress.style.transform = 'scaleX(1)';
  void progress.offsetWidth;
  progress.style.transition = `transform ${duration}ms linear`;
  progress.style.transform = 'scaleX(0)';

  setTimeout(() => {
    box.classList.remove('show');
  }, duration);
}


document.querySelectorAll('[data-action="open-modal"]').forEach(item => {
    item.addEventListener("click", function () {
        const modalId = this.dataset.target;
        const modal = document.getElementById(modalId);

        // Ambil data dari dataset
        const id = this.dataset.id;
        const acara = this.dataset.acara;
        const jumlah = this.dataset.jumlah;
        const divisi = this.dataset.divisi;
        const metode = this.dataset.metode;
        const bankName = this.dataset.bank_name;
        const bankAccount = this.dataset.bank_account;
        const fileUrl = this.dataset.file;

        // Set ke modal
        modal.querySelector('#notif-id').value = id;
        modal.querySelector('#event').value = acara;
        modal.querySelector('#amount').value = jumlah;
        modal.querySelector('.title-modal').textContent = divisi;

        // File download handler
        if(fileUrl){
            modal.querySelector('#file-download').style.display = "flex";
            modal.querySelector('#file-download').href = fileUrl;
            modal.querySelector('#no-file').style.display = "none";
        } else {
            modal.querySelector('#file-download').style.display = "none";
            modal.querySelector('#no-file').style.display = "block";
        }

        // Metode pembayaran handler
        const tunaiRadio = modal.querySelector('input[value="tunai"]');
        const transferRadio = modal.querySelector('input[value="transfer"]');
        const bankInfo = modal.querySelector('#bank-info');

        if(metode === "transfer"){
            transferRadio.checked = true;
            bankInfo.style.display = "block";
            modal.querySelector('#bank_name').value = bankName || "";
            modal.querySelector('#bank_account').value = bankAccount || "";
        } else {
            tunaiRadio.checked = true;
            bankInfo.style.display = "none";
        }

        modal.classList.add("active");
    });
});


