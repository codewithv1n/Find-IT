// Report Item button function
document.addEventListener("DOMContentLoaded", () => {
    const btnReport = document.querySelector(".btn-report");
    btnReport.addEventListener("click", () => {
        btnReport.innerHTML = "Reporting...";
        btnReport.disabled = false;
    })
});