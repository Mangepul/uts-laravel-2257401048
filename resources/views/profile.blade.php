<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="profile-section">
        <h1>PROFILE</h1>
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="profile-info">
                    <h2>{{ Auth::user()->nama }}</h2>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
            
            <div class="profile-details">
                <div class="detail-item">
                    <span class="label">NIM:</span>
                    <span class="value">{{ Auth::user()->nim }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Nama:</span>
                    <span class="value">{{ Auth::user()->nama }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Kelas:</span>
                    <span class="value">{{ Auth::user()->kelas }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Email:</span>
                    <span class="value">{{ Auth::user()->email }}</span>
                </div>
            </div>
            
            <div class="profile-actions">
                <a href="{{ route('profile.edit') }}" class="btn edit">Edit Profile</a>
                <a href="{{ route('password.change') }}" class="btn change-password">Ubah Password</a>
            </div>
            
            <div class="back-link">
                <a href="{{ route('home') }}" class="btn kembali">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>

</html>
