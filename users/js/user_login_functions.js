// DOM Manipulation na nagawa ko sa LOGIN
document.addEventListener("DOMContentLoaded", () => {
    const btnLogin = document.querySelector(".btn-login");
    if(btnLogin){
        btnLogin.addEventListener("click", () => {
            btnLogin.innerHTML = "Logging in..."
        })
    }
})