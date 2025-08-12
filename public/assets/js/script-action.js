const monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    function generateCalendar(month, year) {
        const monthYearElement = document.getElementById("month-year");
        const daysContainer = document.getElementById("calendar-days");

        if (!monthYearElement || !daysContainer) {
            return;
        }

        monthYearElement.innerText = `${monthNames[month]} ${year}`;
        daysContainer.innerHTML = "";

        let firstDay = new Date(year, month, 1).getDay();
        let totalDays = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            let emptyDiv = document.createElement("div");
            emptyDiv.className = "empty";
            daysContainer.appendChild(emptyDiv);
        }

        for (let day = 1; day <= totalDays; day++) {
            let dayDiv = document.createElement("div");
            dayDiv.className = "day";
            dayDiv.innerText = day;

            if (
                year === currentDate.getFullYear() &&
                month === currentDate.getMonth() &&
                day === currentDate.getDate()
            ) {
                dayDiv.classList.add("today");
            }

            daysContainer.appendChild(dayDiv);
        }
    }

    function changeMonth(offset) {
        currentMonth += offset;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        } else if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentMonth, currentYear);
    }

    document.addEventListener("DOMContentLoaded", function () {
        generateCalendar(currentMonth, currentYear);
});


document.addEventListener("DOMContentLoaded", function () {
  const imageUploadBlocks = document.querySelectorAll(".image-add-acount");

  imageUploadBlocks.forEach((block) => {
    const fileInput = block.querySelector(".supporting-file");
    const previewContainer = block.querySelector(".image-preview-container");
    const imagePreview = block.querySelector(".image-preview");
    const deleteButton = block.querySelector(".delete-image");
    const uploadLabel = block.querySelector(".custom-file-label");

    previewContainer.style.display = "none";
    imagePreview.src = "";

    if (fileInput && previewContainer && imagePreview && uploadLabel && deleteButton) {
      fileInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file && file.type.startsWith("image/")) {
          const reader = new FileReader();
          reader.onload = function (e) {
            imagePreview.src = e.target.result;
            previewContainer.style.display = "block";
            uploadLabel.style.display = "none";
          };
          reader.readAsDataURL(file);
        }
      });

      deleteButton.addEventListener("click", function () {
        fileInput.value = '';
        imagePreview.src = '';
        previewContainer.style.display = 'none';
        uploadLabel.style.display = 'inline-flex';
      });

      uploadLabel.addEventListener("click", function () {
        fileInput.click();
      });
    }
  });
});


document.addEventListener("DOMContentLoaded", function () {
    const metodeRadios = document.querySelectorAll('input[name="metode"]');
    const bankInfo = document.querySelector(".bank-info");

    metodeRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "transfer") {
                bankInfo.style.display = "block";
            } else {
                bankInfo.style.display = "none";
            }
        });
    });

    const fileInput = document.getElementById("supporting_file");
    const filePreview = document.querySelector(".file-preview");
    const fileName = filePreview.querySelector(".file-name");
    const fileIcon = filePreview.querySelector(".file-icon");
    const deleteFileBtn = filePreview.querySelector(".delete-file");
    const uploadLabel = document.querySelector(".custom-file-label");

    fileInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            fileName.textContent = file.name;
            const ext = file.name.split('.').pop().toLowerCase();

            if (ext === "pdf") {
                fileIcon.setAttribute("icon", "mdi:file-pdf-box");
                fileIcon.style.color = "#e74c3c";
            } else if (ext === "xls" || ext === "xlsx") {
                fileIcon.setAttribute("icon", "mdi:file-excel-box");
                fileIcon.style.color = "#27ae60";
            } else {
                fileIcon.setAttribute("icon", "mdi:file");
                fileIcon.style.color = "#7f8c8d";
            }

            uploadLabel.style.display = "none";
            filePreview.style.display = "flex";
        }
    });

    deleteFileBtn.addEventListener("click", function () {
        fileInput.value = "";
        fileName.textContent = "";
        filePreview.style.display = "none";
        uploadLabel.style.display = "flex";
    });
});


function formatRupiah(angka) {
    angka = angka.replace(/[^,\d]/g, '').toString();
    let split = angka.split(',');
    let sisa = split[0].length % 3;
    let rupiah = split[0].substr(0, sisa);
    let ribuan = split[0].substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah ? 'Rp ' + rupiah : '';
}

document.querySelectorAll('.rupiah-format').forEach(function(input) {
    input.addEventListener('input', function(e) {
        let raw = this.value.replace(/[^0-9]/g, '');
        this.value = formatRupiah(raw);
        let realInput = document.getElementById('jumlah-real');
        if (realInput) {
            realInput.value = raw.replace(/\./g, '');
        }
    });
});

const formatInput = document.getElementById('format');
if (formatInput) {
    formatInput.addEventListener('input', function (e) {
        let raw = e.target.value.replace(/[^0-9]/g, '');
        let formatted = new Intl.NumberFormat('id-ID').format(raw);
        e.target.value = 'Rp ' + formatted;

        let rawInput = document.getElementById('raw_amount');
        if (rawInput) {
            rawInput.value = raw;
        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    const jumlahHariInput = document.getElementById("jumlah_hari");
    const tanggalAwalInput = document.getElementById("tanggal_awal");
    const tanggalAkhirInput = document.getElementById("tanggal_akhir");

    function updateTanggalAkhir() {
        const jumlahHari = parseInt(jumlahHariInput.value);
        const tanggalAwal = new Date(tanggalAwalInput.value);

        if (!isNaN(jumlahHari) && tanggalAwalInput.value) {
            const tanggalBaru = new Date(tanggalAwal);
            tanggalBaru.setDate(tanggalBaru.getDate() + jumlahHari - 1);
            tanggalAkhirInput.value = tanggalBaru.toISOString().split("T")[0];
        }
    }

    jumlahHariInput.addEventListener("input", updateTanggalAkhir);
    tanggalAwalInput.addEventListener("change", updateTanggalAkhir);
});


