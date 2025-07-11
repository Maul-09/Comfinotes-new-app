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

    imageUploadBlocks.forEach((block, index) => {
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
        let raw = this.value.replace(/[^,\d]/g, '');
        this.value = formatRupiah(raw);
        document.getElementById('jumlah-real').value = raw.replace(/\./g, '');
    });
});

document.getElementById('.format').addEventListener('input', function (e) {
    let raw = e.target.value.replace(/[^0-9]/g, '');
    let formatted = new Intl.NumberFormat('id-ID').format(raw);
    e.target.value = 'Rp ' + formatted;

    document.getElementById('raw_amount').value = raw;
});




