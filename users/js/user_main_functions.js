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
    var editBtn = event.target.closest(".btn-edit");
    var commentBtn = event.target.closest(".btn-comment");
    
    if (editBtn || commentBtn) {
        var btn = editBtn || commentBtn;
        var targetModalId = btn.getAttribute("data-modal");
        if (targetModalId) {
            var modal = document.getElementById(targetModalId);
            if (modal) {
                modal.style.display = "block";
                document.body.style.overflow = "hidden";
            }
        }
    }

    if (event.target.classList.contains("close")) {
        event.target.closest(".modal").style.display = "none";
    }
    
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none";
    }
});