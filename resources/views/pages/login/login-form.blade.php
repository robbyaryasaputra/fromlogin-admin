<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Publik - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* [PERUBAHAN] Menyesuaikan tema dengan dashboard (Pink, Hitam, Putih) */
        :root {
            --primary-color: #e91e63; /* [BARU] Warna pink cerah dari dashboard Anda */
            --primary-color-dark: #c2185b; /* [BARU] Warna pink lebih gelap untuk hover */
            --background-dark: #111827; /* [BARU] Warna latar belakang hitam/gelap */
            --card-background: #ffffff;
            --border-color: #d2d6da;
            --text-color: #1f2937; /* Warna teks utama (lebih gelap) */
            --text-light: #ffffff;
            --text-muted: #6c757d;
            --danger-bg: #f8d7da;
            --danger-text: #721c24;
            --danger-border: #f5c6cb;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-dark); /* [DIUBAH] Latar belakang gelap */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 1rem;
            box-sizing: border-box;
        }

        /* [BARU] Wrapper utama untuk menampung dua panel */
        .login-container {
            display: flex;
            width: 100%;
            max-width: 800px; /* Lebar untuk dua kolom */
            background: var(--card-background);
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border: 1px solid #374151;
            overflow: hidden; /* Penting untuk menjaga border-radius */
        }

        /* [BARU] Panel kiri untuk form login */
        .login-form-panel {
            flex-basis: 50%;
            padding: 3rem 2.5rem;
            text-align: center;
        }

        /* [BARU] Panel kanan untuk overlay */
        .login-overlay-panel {
            flex-basis: 50%;
            background-color: var(--primary-color);
            /* Membuat panel overlay melengkung seperti di gambar */
            border-radius: 100px 0 0 100px;
            /* Pusatkan konten di dalam overlay */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            text-align: center;
            color: var(--text-light);
            /* [PENTING] Menggeser sedikit ke kiri agar menutupi sambungan */
            margin-left: -2px;
        }

        .login-header {
            margin-bottom: 2rem;
        }

        .login-logo {
            color: var(--primary-color); /* Warna logo jadi pink */
            width: 50px;
            height: 50px;
            margin-bottom: 1rem;
        }

        /* Style untuk Judul */
        h2 {
            font-weight: 700;
            color: var(--text-color);
            margin: 0;
            font-size: 1.75rem;
        }
        /* Style Judul di panel overlay */
        .login-overlay-panel h2 {
            color: var(--text-light);
            font-size: 2rem;
        }

        p.subtitle {
            font-size: 1rem;
            color: var(--text-muted);
            margin-top: 0.5rem;
        }

        /* [DIUBAH] Style Subtitle di panel overlay */
        .login-overlay-panel p {
            font-size: 1rem;
            margin-top: 1rem;
            line-height: 1.6;
            max-width: 300px;
            opacity: 0.9;
        }

        /* [BARU] Style untuk judul project di overlay */
        .login-overlay-panel .project-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0;
            line-height: 1.3;
            opacity: 1;
        }

        .form-group {
            margin-bottom: 1.25rem;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-color);
            font-size: 0.9rem;
        }

        input.form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input.form-control:focus {
            border-color: var(--primary-color); /* Warna focus pink */
            outline: none;
            box-shadow: 0 0 0 3px rgba(233, 30, 99, 0.15); /* Shadow focus pink */
        }

        input.form-control::placeholder {
            color: #adb5bd;
            font-style: italic;
        }

        /* Tombol standar (Login) */
        button {
            width: 100%;
            padding: 0.8rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: background-color 0.2s, transform 0.2s, border-color 0.2s, color 0.2s;
            text-decoration: none;
            display: inline-block;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: var(--primary-color); /* Warna tombol pink */
            color: #fff;
            border: 2px solid var(--primary-color);
            box-shadow: 0 4px 6px rgba(233, 30, 99, 0.2); /* Shadow tombol pink */
        }

        button[type="submit"]:hover {
            background-color: var(--primary-color-dark); /* Warna hover pink lebih gelap */
            border-color: var(--primary-color-dark);
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        .error-message {
            color: var(--danger-text);
            font-size: 0.875em;
            margin-top: 0.25rem;
        }

        .credentials-error {
            margin-bottom: 1.5rem;
            text-align: center;
            background-color: var(--danger-bg);
            color: var(--danger-text);
            padding: 1rem;
            border-radius: 8px;
            font-weight: 500;
            border: 1px solid var(--danger-border);
        }

        .login-footer {
            margin-top: 1.5rem;
            color: var(--text-muted);
            font-size: 0.9em;
        }

        /* [BARU] Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 420px;
                margin: 1rem;
            }

            .login-form-panel {
                flex-basis: auto;
                padding: 2.5rem 2rem;
            }

            .login-overlay-panel {
                flex-basis: auto;
                /* Menghilangkan lengkungan di mobile */
                border-radius: 0 0 10px 10px;
                padding: 2.5rem 2rem;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">

        <div class="login-form-panel">
            <div class="login-header">
                <svg class="login-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M4 21V10.075L12 3L20 10.075V21H14V14H10V21H4ZM6 19H8V12H16V19H18V11.05L12 5.55L6 11.05V19ZM12 13.5Z"/>
                </svg>
                <h2>Portal Publik</h2>
                <p class="subtitle">Silakan login untuk melanjutkan</p>
            </div>

            @if ($errors->has('credentials'))
                <div class="credentials-error">
                    {{ $errors->first('credentials') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username Anda">
                    @error('username')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password">
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Login</button>
            </form>

            <div class="login-footer">
                <span>&copy; {{ date('Y') }} Portal Publik.</span>
            </div>
        </div>

        <div class="login-overlay-panel">
            <h2>Selamat Datang</h2>

            <p class="project-title">Portal Publik</p>

            <p>
                <strong>Project Bina Desa</strong>
                <br><br>
                Platform terintegrasi untuk digitalisasi layanan dan administrasi kependudukan di wilayah Anda.
            </p>

            </div>

    </div>

</body>
</html>
