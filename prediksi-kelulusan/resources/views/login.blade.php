<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Predict</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <!-- Left Section -->
        <div class="left-section">
            <h1>Welcome to <br><span class="fw-bold text-primary">Predict</span></h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="username" required>
                </div>
                <!-- Password -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control pe-5" placeholder="password" required>
                    <!-- Eye toggle -->
                    <button type="button" id="togglePassword" class="eye-toggle">
                        <i id="eyeOpen" class="bi bi-eye-fill"></i>
                        <i id="eyeClosed" class="bi bi-eye-slash-fill d-none"></i>
                    </button>
                </div>
                <!-- Submit -->
                <button type="submit" class="btn btn-primary">Login</button>
                <p class="mt-3">Lupa password? <a href="#">Silahkan hubungi admin.</a></p>
            </form>
        </div>
        <!-- Right Section -->
        <div class="right-section">
            <div class="content">
                <img src="{{ asset('image/logoPredict.png') }}" alt="Logo" class="logo-image">
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const eyeOpen = document.getElementById("eyeOpen");
        const eyeClosed = document.getElementById("eyeClosed");

        togglePassword.addEventListener("click", function () {
            const isVisible = passwordInput.type === "text";
            passwordInput.type = isVisible ? "password" : "text";
            eyeOpen.classList.toggle("d-none", !isVisible);
            eyeClosed.classList.toggle("d-none", isVisible);
        });
    </script>
</body>
</html>
