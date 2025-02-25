<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="register-section">
        <h1>REGISTER</h1>
        <form action="{{ route('register.submit') }}" method="POST" class="form-container">
            @csrf

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <i class="toggle-password fas fa-eye" onclick="togglePassword('password')"></i>
            </div>

            <label for="password_confirmation">Konfirmasi Password:</label>
            <div class="password-container">
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <i class="toggle-password fas fa-eye" onclick="togglePassword('password_confirmation')"></i>
            </div>

            <!-- Tombol Daftar dan Kembali -->
            <div class="button-group">
                <button type="submit" class="btn daftar">Daftar</button>
                <a href="{{ route('welcome') }}" class="btn kembali">Kembali</a>
            </div>
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