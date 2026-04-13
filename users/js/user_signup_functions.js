// DOM Manipulation na nagawa ko sa Signup
document.addEventListener("DOMContentLoaded", () => {
    const btnSignup = document.querySelector(".btn-signup");
    btnSignup.addEventListener("click", () => {
        btnSignup.innerHTML = "Signing up...";
        btnSignup.disabled = false;
    })
})