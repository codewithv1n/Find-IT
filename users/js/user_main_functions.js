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


// modal for edit ng post and comment
document.addEventListener("click", function(event) {
    const openBtn = event.target.closest(".btn-edit, .btn-comment");
    if (openBtn) {
        const targetModalId = openBtn.getAttribute("data-modal");
        const modal = document.getElementById(targetModalId);
        if (modal) {
            modal.style.display = "block";
            document.body.style.overflow = "hidden"; 
        }
    }
    
    const isCloseBtn = event.target.classList.contains("close");
    const isBackdrop = event.target.classList.contains("modal");

    if (isCloseBtn || isBackdrop) {
        const modal = event.target.closest(".modal");
        if (modal) {
            modal.style.display = "none";
            document.body.style.overflow = "auto"; 
        }
    }
});