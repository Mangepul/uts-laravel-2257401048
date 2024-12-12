<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pendaftaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e90ff;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            color: #f8f9fa;
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #f8f9fa;
        }

        /* Style untuk semua input */
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        /* Container untuk password */
        .password-container {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        /* Style khusus untuk input password */
        .password-container input {
            width: 100%;
            margin-bottom: 0;
            padding-right: 45px; 
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            transition: all 0.3s ease;
        }

        .toggle-password:hover {
            color: #333;
        }

        input:focus {
            outline: none;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #00bfff, #0056b3);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #0056b3, #00bfff);
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 35px;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(135deg, #00bfff, #0056b3);
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #0056b3, #00bfff);
        }

        @media (max-width: 600px) {
            form {
                padding: 20px;
                width: 90%;
            }

            input, button[type="submit"] {
                padding: 10px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <h1>Halaman Pendaftaran</h1>
    <form action="{{ route('register.submit') }}" method="POST">
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

        <button type="submit">Daftar</button>
    </form>
    <a href="{{ route('welcome') }}">Kembali</a>

    <script>
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
