async function logout() {
    try {
        const response = await fetch('../controllers/logout_process.php'); 
        if (response.ok) {
            window.location.href = 'login.php';
        }
    } catch (error) {
        console.error("Connection error:", error);
    }
}


// DOM manipulation sa innertext ng button ng logout
document.addEventListener("DOMContentLoaded", () =>{
    const btnLogout = document.getElementById('btnLogout');
     btnLogout.addEventListener("click", () => {
        btnLogout.innerHTML = "Logging out...";
    })
});

