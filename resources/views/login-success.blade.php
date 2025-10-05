<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(120deg, #00c6ff 0%, #007bff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success-container {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            width: 350px;
            text-align: center;
        }
        .success-logo {
            width: 60px;
            margin-bottom: 1rem;
        }
        h2 {
            font-weight: 700;
            color: #28a745;
            margin-bottom: 1.5rem;
        }
        .username {
            font-size: 1.1rem;
            color: #007bff;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .desc {
            color: #555;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        .btn {
            display: inline-block;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(90deg, #007bff 0%, #00c6ff 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            margin-top: 1rem;
        }
        .btn:hover {
            background: linear-gradient(90deg, #0056b3 0%, #0093c4 100%);
        }
    </style>
</head>
<body>
    <div class="success-container">
        <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Success Logo" class="success-logo">
        <h2>Login Berhasil!</h2>
        <div class="username">Selamat datang, <b>{{ $username }}</b></div>
        <div class="desc">Anda berhasil masuk ke Portal Publik Admin.</div>
        <a href="/auth" class="btn">Logout</a>
    </div>
</body>
</html>
