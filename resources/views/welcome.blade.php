    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to NGAWAG RESORT</title>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
        <!-- Navbar -->
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

        <!-- Welcome Section -->
        <div class="slider">
            <div class="slides">
                <img src="{{ asset('gambar/welcome1.jpg') }}" alt="Foto 1">
                <img src="{{ asset('gambar/welcome2.jpg') }}" alt="Foto 2">
                <img src="{{ asset('gambar/welcome3.jpg') }}" alt="Foto 3">
            </div>
            <div class="welcome-text">
                <h1>SELAMAT DATANG DI NGAWAG RESORT</h1>
                <p>Temukan kedamaian dan keindahan alam hanya di NGAWAG RESORT.</p>
            </div>
        </div>

        <!-- Additional Content -->
        <div class="additional-content">
            <h2>Kenapa Memilih NGAWAG Resort?</h2>
            <p>NGAWAG Resort menawarkan pengalaman menginap yang luar biasa dengan pemandangan alam yang indah, fasilitas lengkap, dan layanan terbaik.</p>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-swimming-pool"></i>
                    <h3>Fasilitas Mewah</h3>
                    <p>Kami menyediakan fasilitas kelas dunia untuk kenyamanan Anda.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-mountain"></i>
                    <h3>Pemandangan Alam</h3>
                    <p>Rasakan keindahan alam yang memukau langsung dari kamar Anda.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-concierge-bell"></i>
                    <h3>Layanan Terbaik</h3>
                    <p>Tim kami siap melayani Anda dengan sepenuh hati.</p>
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

        <script>
            // Automatic slider with smooth transition
            let currentSlide = 0;
            const slides = document.querySelectorAll('.slides img');
            const totalSlides = slides.length;

            setInterval(() => {
                slides.forEach(slide => slide.style.opacity = "0");
                slides[currentSlide].style.opacity = "1";
                currentSlide = (currentSlide + 1) % totalSlides;
            }, 3000);
        </script>
    </body>

    </html>