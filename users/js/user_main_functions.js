// Report Item button DOM manipulation
document.addEventListener("DOMContentLoaded", () => {
    const btnReport = document.getElementById("btnReport");
    if (btnReport) {
        btnReport.addEventListener("click", () => {
            btnReport.innerHTML = "Reporting...";
        });
    }

    // hide alerts 
    const alerts = document.querySelectorAll(".alert-box, .alert-box-report-item, .alert-box-my-post");
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.display = "none";
        }, 3000); 
    });
});


// modal for edit ng post
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("btn-edit")) {
        var targetModalId = event.target.getAttribute("data-modal");
        var modal = document.getElementById(targetModalId);
        modal.style.display = "block";
    }

    if (event.target.classList.contains("close")) {
        event.target.closest(".modal").style.display = "none";
    }
    
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none";
    }
});