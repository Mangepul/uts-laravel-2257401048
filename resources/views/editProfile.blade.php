<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="profile-section">
        <h1>EDIT PROFILE</h1>

        <form action="{{ route('profile.update') }}" method="POST" class="form-container">
            @csrf

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="{{ Auth::user()->nim }}" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ Auth::user()->nama }}" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" value="{{ Auth::user()->kelas }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>

            <!-- Tombol Simpan dan Kembali -->
            <div class="button-group">
                <button type="submit" class="btn simpan">Simpan</button>
                <a href="{{ route('profile') }}" class="btn kembali">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>