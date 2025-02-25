<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/resort.css') }}">
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
    
    <!-- Hero Section -->
    <div class="hero">
        <h1>Kamar dan Fasilitas Kami</h1>
        <p>Temukan pengalaman menginap terbaik hanya di NGAWAG Resort.</p>
    </div>

    <!-- Room Categories -->
    <div class="room-categories">
        <h2>Kategori Kamar</h2>
        <div class="categories">
            <div class="category">
                <img src="{{ asset('gambar/deluxe.jpg') }}" alt="Deluxe Room">
                <h3>Deluxe Room</h3>
                <p>Kamar mewah dengan pemandangan indah.</p>
            </div>
            <div class="category">
                <img src="{{ asset('gambar/vip.jpg') }}" alt="VIP Room">
                <h3>VIP Room</h3>
                <p>Kenyamanan ekstra dengan fasilitas eksklusif.</p>
            </div>
            <div class="category">
                <img src="{{ asset('gambar/vvip.jpg') }}" alt="VVIP Room">
                <h3>VVIP Room</h3>
                <p>Pengalaman menginap paling mewah dan eksklusif.</p>
            </div>
        </div>
    </div>

    <!-- Room List -->
    <div class="room-list">
        <h2>Daftar Kamar</h2>
        <div class="rooms">
            <!-- Room 1 -->
            <div class="room">
                <img src="{{ asset('gambar/kamar1.jpg') }}" alt="Kamar 1">
                <h3>Deluxe Room 101</h3>
                <p>Harga: Rp 1.000.000/malam</p>
                <p>Kamar dengan pemandangan taman dan fasilitas lengkap.</p>
                @if(Auth::check())
                <a href="{{ route('booking', ['id' => 1]) }}" class="btn">Pesan Sekarang</a>
                @else
                <a href="{{ route('login') }}" class="btn">Login untuk Pesan</a>
                @endif
            </div>

            <!-- Room 2 -->
            <div class="room">
                <img src="{{ asset('gambar/kamar2.jpg') }}" alt="Kamar 2">
                <h3>VIP Room 201</h3>
                <p>Harga: Rp 2.500.000/malam</p>
                <p>Kamar luas dengan pemandangan laut dan layanan VIP.</p>
                @if(Auth::check())
                <a href="{{ route('booking', ['id' => 2]) }}" class="btn">Pesan Sekarang</a>
                @else
                <a href="{{ route('login') }}" class="btn">Login untuk Pesan</a>
                @endif
            </div>

            <!-- Room 3 -->
            <div class="room">
                <img src="{{ asset('gambar/kamar3.jpg') }}" alt="Kamar 3">
                <h3>VVIP Room 301</h3>
                <p>Harga: Rp 5.000.000/malam</p>
                <p>Kamar eksklusif dengan fasilitas pribadi dan layanan premium.</p>
                @if(Auth::check())
                <a href="{{ route('booking', ['id' => 3]) }}" class="btn">Pesan Sekarang</a>
                @else
                <a href="{{ route('login') }}" class="btn">Login untuk Pesan</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 NGAWAG Resort. All rights reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>
</body>

</html>