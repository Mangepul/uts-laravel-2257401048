<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - NGAWAG RESORT</title>
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .booking-section {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .pesan {
            background-color: #4CAF50;
            color: white;
        }

        .pesan:hover {
            background-color: #45a049;
        }

        .kembali {
            background-color: #f44336;
            color: white;
            text-decoration: none;
            text-align: center;
        }

        .kembali:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <div class="booking-section">
        <h1>BOOKING KAMAR</h1>
        <form action="{{ route('booking.store') }}" method="POST" class="form-container">
            @csrf

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="check_in">Tanggal Check-in:</label>
            <input type="date" id="check_in" name="check_in" required>

            <label for="check_out">Tanggal Check-out:</label>
            <input type="date" id="check_out" name="check_out" required>

            <label for="jumlah_tamu">Jumlah Tamu:</label>
            <input type="number" id="jumlah_tamu" name="jumlah_tamu" min="1" value="1" required>

            <label for="catatan">Catatan Tambahan:</label>
            <textarea id="catatan" name="catatan"></textarea>

            <div class="button-group">
                <button type="submit" class="btn pesan">Pesan Sekarang</button>
                <a href="{{ route('welcome') }}" class="btn kembali">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>