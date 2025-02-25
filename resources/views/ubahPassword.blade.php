<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="profile-section">
        <h1>UBAH PASSWORD</h1>

        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="form-container">
            @csrf

            <label for="current_password">Password Saat Ini:</label>
            <div class="password-container">
                <input type="password" id="current_password" name="current_password" required>
                <i class="toggle-password fas fa-eye" onclick="togglePassword('current_password')"></i>
            </div>

            <label for="new_password">Password Baru:</label>
            <div class="password-container">
                <input type="password" id="new_password" name="new_password" required>
                <i class="toggle-password fas fa-eye" onclick="togglePassword('new_password')"></i>
            </div>

            <label for="new_password_confirmation">Konfirmasi Password Baru:</label>
            <div class="password-container">
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                <i class="toggle-password fas fa-eye" onclick="togglePassword('new_password_confirmation')"></i>
            </div>

            <!-- Tombol Simpan dan Kembali -->
            <div class="button-group">
                <button type="submit" class="btn simpan">Simpan</button>
                <a href="{{ route('profile') }}" class="btn kembali">Kembali</a>
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