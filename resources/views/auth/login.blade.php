<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .spinner{display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(255, 255, 255, 0.3); border-radius: 50%; border-top-color: #fff; animation: spin 1s ease-in-out infinite;}
            @keyframes spin {
                to { transform: rotate(360deg); }
            }
            .input-error{border-color: #f87171 !important; background-color: rgba(248, 113, 113, 0.1) !important;}
            @keyframes slideDown{
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
            .animate-slideDown{animation: slideDown 0.3s ease-out;}
            .animate-shake{animation: shake 0.5s ease-in-out;}
        </style>

        <script>
            function handleLogin(event) {
                const form = event.target;
                const email = form.email.value.trim();
                const password = form.password.value.trim();
                const button = form.querySelector('button');
                const buttonText = button.querySelector('.btn-text');
                const buttonSpinner = button.querySelector('.spinner');
                const oldError = document.getElementById('js-error-message');
                if (oldError) oldError.remove();
                const inputs = form.querySelectorAll('input');
                inputs.forEach(input => {
                    input.classList.remove('input-error');
                });
                if (!email || !password) {
                    const errorDiv = document.createElement('div');
                    errorDiv.id = 'js-error-message';
                    errorDiv.className = 'mb-4 p-4 bg-red-500/20 border border-red-500/30 rounded-xl text-white text-center animate-slideDown';
                    errorDiv.innerHTML = `
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span>Por favor, completa todos los campos</span>
                        </div>
                    `;
                    const title = form.previousElementSibling;
                    title.parentNode.insertBefore(errorDiv, title.nextSibling);
                    if (!email) {
                        form.email.classList.add('input-error');
                        const emailLabel = form.email.closest('label');
                        if (emailLabel) {
                            const labelText = emailLabel.querySelector('span:first-child');
                            if (labelText) labelText.classList.add('text-red-300');
                        }
                    }
                    if (!password) {
                        form.password.classList.add('input-error');
                        const passwordLabel = form.password.closest('label');
                        if (passwordLabel) {
                            const labelText = passwordLabel.querySelector('span:first-child');
                            if (labelText) labelText.classList.add('text-red-300');
                        }
                    }
                    event.preventDefault();
                    return false;
                }
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    const errorDiv = document.createElement('div');
                    errorDiv.id = 'js-error-message';
                    errorDiv.className = 'mb-4 p-4 bg-red-500/20 border border-red-500/30 rounded-xl text-white text-center animate-slideDown';
                    errorDiv.innerHTML = `
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span>Por favor, ingresa un email válido</span>
                        </div>
                    `;
                    const title = form.previousElementSibling;
                    title.parentNode.insertBefore(errorDiv, title.nextSibling);
                    form.email.classList.add('input-error');
                    const emailLabel = form.email.closest('label');
                    if (emailLabel) {
                        const labelText = emailLabel.querySelector('span:first-child');
                        if (labelText) labelText.classList.add('text-red-300');
                    }
                    event.preventDefault();
                    return false;
                }
                if (password.length < 6) {
                    const errorDiv = document.createElement('div');
                    errorDiv.id = 'js-error-message';
                    errorDiv.className = 'mb-4 p-4 bg-red-500/20 border border-red-500/30 rounded-xl text-white text-center animate-slideDown';
                    errorDiv.innerHTML = `
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span>La contraseña debe tener al menos 6 caracteres</span>
                        </div>
                    `;
                    const title = form.previousElementSibling;
                    title.parentNode.insertBefore(errorDiv, title.nextSibling);
                    form.password.classList.add('input-error');
                    const passwordLabel = form.password.closest('label');
                    if (passwordLabel) {
                        const labelText = passwordLabel.querySelector('span:first-child');
                        if (labelText) labelText.classList.add('text-red-300');
                    }
                    event.preventDefault();
                    return false;
                }
                button.disabled = true;
                buttonText.style.display = 'none';
                buttonSpinner.style.display = 'inline-block';
                button.classList.add('btn-loading');
                return true;
            }
            document.addEventListener('DOMContentLoaded', function() {
                const emailInput = document.querySelector('input[name="email"]');
                const passwordInput = document.querySelector('input[name="password"]');
                function clearInputError(input) {
                    input.classList.remove('input-error');
                    const label = input.closest('label');
                    if (label) {
                        const labelText = label.querySelector('span:first-child');
                        if (labelText) labelText.classList.remove('text-red-300');
                    }
                    const errorMsg = document.getElementById('js-error-message');
                    if (errorMsg) errorMsg.remove();
                }
                if (emailInput) {
                    emailInput.addEventListener('input', function() {
                        clearInputError(this);
                    });
                }
                if (passwordInput) {
                    passwordInput.addEventListener('input', function() {
                        clearInputError(this);
                    });
                }
                @if($errors->any())
                    const button = document.querySelector('button[type="submit"]');
                    if (button) {
                        const buttonText = button.querySelector('.btn-text');
                        const buttonSpinner = button.querySelector('.spinner');
                        if (buttonText) buttonText.style.display = 'inline';
                        if (buttonSpinner) buttonSpinner.style.display = 'none';
                        button.disabled = false;
                        button.classList.remove('btn-loading');
                    }
                    @if($errors->has('email'))
                        const emailInput = document.querySelector('input[name="email"]');
                        if (emailInput) {
                            emailInput.classList.add('input-error');
                            const emailLabel = emailInput.closest('label');
                            if (emailLabel) {
                                const labelText = emailLabel.querySelector('span:first-child');
                                if (labelText) labelText.classList.add('text-red-300');
                            }
                        }
                    @endif
                    @if($errors->has('password'))
                        const passwordInput = document.querySelector('input[name="password"]');
                        if (passwordInput) {
                            passwordInput.classList.add('input-error');
                            const passwordLabel = passwordInput.closest('label');
                            if (passwordLabel) {
                                const labelText = passwordLabel.querySelector('span:first-child');
                                if (labelText) labelText.classList.add('text-red-300');
                            }
                        }
                    @endif
                @endif
            });
        </script>
    </head>
    <body class="relative bg-fuchsia-800 overflow-hidden">
        <div class="absolute left-[-600px] top-1/2 -translate-y-1/2 w-[1500px] h-[1500px] rounded-full shadow-2xl bg-no-repeat bg-center" style="background-image: url('/img/Fondo2.jpg'); background-size: contain;"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 min-h-screen flex items-center justify-center p-6">
            <div class="w-full max-w-lg">
                <div class="card rounded-3xl shadow-2xl backdrop-blur-lg bg-white/20 border border-white/30">
                    <div class="card-body p-10">
                        <h2 class="text-4xl font-bold text-center mb-8 text-white" style="text-shadow: 0 0 3px #9333ea, 0 0 6px #9333ea, 0 0 9px #9333ea;">
                            Iniciar sesión
                        </h2>
                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-500/20 border border-red-500/30 rounded-xl text-white text-center animate-shake">
                                @foreach ($errors->all() as $error)
                                    <div class="flex items-center justify-center gap-2 mb-2 last:mb-0">
                                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>{{ $error }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="/login" class="flex flex-col gap-6" onsubmit="return handleLogin(event)">
                            @csrf
                            <div class="space-y-6">
                                <label class="block">
                                    <span class="block text-white text-lg font-medium mb-3">Email</span>
                                    <input type="email" name="email" placeholder="Escribe tu email" class="w-full h-14 px-5 bg-white/20 border-2 border-white/30 text-white placeholder-white/60 text-lg rounded-2xl focus:bg-white/30 focus:border-purple-400 focus:outline-none transition-all duration-300"/>
                                </label>
                                <label class="block">
                                    <span class="block text-white text-lg font-medium mb-3">Contraseña</span>
                                    <input type="password" name="password" placeholder="Escribe tu contraseña" class="w-full h-14 px-5 bg-white/20 border-2 border-white/30 text-white placeholder-white/60 text-lg rounded-2xl focus:bg-white/30 focus:border-purple-400 focus:outline-none transition-all duration-300"/>
                                </label>
                            </div>
                            <button type="submit" class="btn bg-purple-600 hover:bg-purple-700 text-white text-lg h-14 rounded-2xl w-full mt-4 border-none transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class="btn-text">Entrar</span>
                                <span class="spinner" style="display: none;"></span>
                            </button>
                        </form>
                        <p class="text-center text-white/90 text-lg mt-8">
                            ¿No tienes una cuenta?
                            <a href="/register" class="text-white font-semibold hover:text-purple-200 hover:underline ml-2">
                                Regístrate aquí
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>