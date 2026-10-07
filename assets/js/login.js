document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    const alertBox = document.getElementById("alertBox");
    const btnSubmit = document.getElementById("btnSubmit");

    // Mostrar/Ocultar contraseña
    togglePassword.addEventListener("click", () => {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        
        // Cambiar ícono
        const icon = togglePassword.querySelector("i");
        icon.classList.toggle("fa-eye");
        icon.classList.toggle("fa-eye-slash");
    });

    // Procesar formulario mediante AJAX
    loginForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const email = document.getElementById("email").value;
        const password = passwordInput.value;

        // Reset UI
        alertBox.classList.add("d-none");
        btnSubmit.disabled = true;
        btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Procesando...';

        try {
            const response = await fetch("api/login.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ email, password })
            });

            const data = await response.json();

            if (data.status === "success") {
                // Alerta de éxito e ingreso al Dashboard
                showAlert(data.message, "success");
                setTimeout(() => {
                    window.location.href = "views/dashboard.php";
                }, 1000);
            } else {
                // Alerta de error (Credenciales inválidas)
                showAlert(data.message, "danger");
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = "Entrar";
            }

        } catch (error) {
            showAlert("Error de conexión al servidor.", "danger");
            btnSubmit.disabled = false;
            btnSubmit.innerHTML = "Entrar";
        }
    });

    function showAlert(message, type) {
        alertBox.className = `alert alert-${type}`;
        alertBox.textContent = message;
        alertBox.classList.remove("d-none");
    }
});