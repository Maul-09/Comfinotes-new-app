const monthNames = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
];

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

function generateCalendar(month, year) {
    document.getElementById("month-year").innerText = `${monthNames[month]} ${year}`;
        const daysContainer = document.getElementById("calendar-days");
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

                    if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
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

generateCalendar(currentMonth, currentYear);

//

document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("supporting-file");
    const previewContainer = document.getElementById("image-preview-container");
    const previewImage = document.getElementById("image-preview");
    const deleteBtn = document.getElementById("delete-image");
    const fileLabelText = document.getElementById("file-label-text");

    fileInput.addEventListener("change", function () {
        const file = this.files[0];

        if (file && file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = "block";
                fileLabelText.textContent = file.name;
            };

            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = "none";
            previewImage.src = "";
            fileLabelText.textContent = "Drag dan Drop di sini, Atau Pilih dari File";
        }
    });

    deleteBtn.addEventListener("click", function () {
        fileInput.value = "";
        previewImage.src = "";
        previewContainer.style.display = "none";
        fileLabelText.textContent = "Drag dan Drop di sini, Atau Pilih dari File";
    });
});
