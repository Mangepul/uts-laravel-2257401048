<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Awal</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e90ff;
            color: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            color: #f8f9fa;
            margin-bottom: 20px;
        }

        .button-container {
            margin-top: 10px;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 35px;
            font-size: 1rem;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(135deg, #00bfff, #0056b3); 
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: none;
        }

        a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #0056b3, #00bfff);
        }

        .watermark {
            font-size: 0.9rem;
            color: #f1f1f1;
            font-style: italic;
            opacity: 0.8;
            text-align: center;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        .watermark:hover {
            color: #fafafa;
            opacity: 1;
            transition: color 0.3s ease, opacity 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>SELAMAT DATANG</h1>
        <div class="button-container">
            <a href="{{ route('register') }}">Daftar</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
    <div class="watermark">Created by Saefullah_MI22B_2257401048</div>
</body>
</html>
