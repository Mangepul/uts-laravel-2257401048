<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-stats {
            text-align: center;
            padding: 20px;
        }

        .card-stats .number {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            {{ $username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('kategori.index') }}">Kelola Kategori</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('produk.index') }}">Kelola Produk</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Selamat Datang, {{ $username }}!</h2>
                        <p>Ini adalah halaman admin untuk mengelola konten website.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Produk Card -->
            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <h5 class="card-title">Total Produk</h5>
                        <div class="number">{{ $jumlahProduk }}</div>
                        <a href="{{ route('produk.index') }}" class="btn btn-primary mt-3">Kelola Produk</a>
                    </div>
                </div>
            </div>

            <!-- Kategori Card -->
            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori</h5>
                        <div class="number">{{ $jumlahKategori }}</div>
                        <a href="{{ route('kategori.index') }}" class="btn btn-success mt-3">Kelola Kategori</a>
                    </div>
                </div>
            </div>

            <!-- User Card -->
            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengguna</h5>
                        <div class="number">{{ $jumlahUser }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Menu Cepat
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2">
                            <a href="{{ route('kategori.index') }}" class="btn btn-outline-primary">Kelola Kategori</a>
                            <a href="{{ route('produk.index') }}" class="btn btn-outline-success">Kelola Produk</a>
                            <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">Halaman Utama</a>
                            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Keluar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>