<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <div class="login-section">
        <h1>LOGIN</h1>
        <form action="{{ route('login.submit') }}" method="POST" class="form-container">
            @csrf

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <div class="input-container">
                <input type="password" id="password" name="password" required>
                <i class="toggle-password fas fa-eye" onclick="togglePassword('password')"></i>
            </div>

            <button type="submit" class="btn">Login</button>

            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </form>
    </div>

    <script>
        // Fitur toggle password
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const icon = event.target;

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>