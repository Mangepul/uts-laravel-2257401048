<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('gambar/logo-ngawag.png') }}" alt="Logo NGAWAG">
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('welcome') }}">Home</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>

            @auth
            <!-- Menu yang hanya muncul jika user sudah login -->
            <li><a href="{{ route('home') }}">Resort</a></li>
            <li><a href="{{ route('profile') }}">My Profile</a></li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
            <!-- Menu untuk user yang belum login -->
            <li><a href="{{ route('login') }}">Login</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Tentang Kami Section -->
    <section id="about" class="about-section">
        <h1>Tentang Kami</h1>
        <p>Kami Merupakan Mahasiswa Politeknik Piksi Input Serang Jurusan Manajemen Informatika.</p>
    </section>

    <!-- Anggota Tim Section -->
    <section id="team" class="team-section">
        <h2>Anggota Tim</h2>
        <div class="team-container">
            <!-- Anggota 1 -->
            <div class="team-member">
                <img src="{{ asset('gambar/Saefullah.jpeg') }}" alt="Saefullah">
                <div class="team-member-content">
                    <h3>Saefullah</h3>
                    <p><strong>NIM:</strong> 2257401048</p>
                    <p><strong>Kelas:</strong> MI22B</p>
                    <p>Seorang Lelaki setia dan rajin menabung ,Tapi Selalu Terjebak Dalam Friend Zone.</p>
                </div>
            </div>
            <!-- Anggota 2 -->
            <div class="team-member">
                <img src="{{ asset('gambar/daiyan.jpg') }}" alt="M Daiyan Illalah">
                <div class="team-member-content">
                    <h3>M Daiyan Illalah</h3>
                    <p><strong>NIM:</strong> 2257402055</p>
                    <p><strong>Kelas:</strong> MI22B</p>
                    <p>laki laki yang percaya diri ,Tapi Selalu kalah Sama Masa lalu.</p>
                </div>
            </div>
            <!-- Anggota 3 -->
            <div class="team-member">
                <img src="{{ asset('gambar/latief.jpg') }}" alt="Abdul Latief">
                <div class="team-member-content">
                    <h3>Abdul Latief</h3>
                    <p><strong>NIM:</strong> 22574010</p>
                    <p><strong>Kelas:</strong> MI22B</p>
                    <p>Lelaki penyayang keluarga, Tapi Dianggap sebatas teman.</p>
                </div>
            </div>
            <!-- Anggota 4 -->
            <div class="team-member">
                <img src="{{ asset('gambar/edo.jpg') }}" alt="Edo Nuralimin">
                <div class="team-member-content">
                    <h3>Edo Nuralimin</h3>
                    <p><strong>NIM:</strong> 22574010</p>
                    <p><strong>Kelas:</strong> TI-4B</p>
                    <p>Lelaki yang bertanggung jawab ,Tapi Selalu kalah dengan yang menemani dia sepanjang waktu.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer>
        <p>© 2025 NGAWAG Resort. All rights reserved.</p>
    </footer>
</body>

</html>