// Report Item button function
document.addEventListener("DOMContentLoaded", () => {
    const btnReport = document.getElementById("btn-report");
    if(btnReport){
        btnReport.addEventListener("click", () => {
            btnReport.innerHTML = "Reporting..."
        })
    }
});