<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Publik - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(120deg, #007bff 0%, #00c6ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            width: 350px;
            text-align: center;
        }
        .login-logo {
            width: 60px;
            margin-bottom: 1rem;
        }
        h2 {
            font-weight: 700;
            color: #007bff;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }
        input {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #b3b3b3;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 1rem;
            background: #f7f7f7;
            transition: border-color 0.2s;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(90deg, #007bff 0%, #00c6ff 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 0.5rem;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
            transition: background 0.2s;
        }
        button:hover {
            background: linear-gradient(90deg, #0056b3 0%, #0093c4 100%);
        }
        .error-message {
            color: #dc3545;
            font-size: 0.95em;
            margin-top: 0.25rem;
        }
        .credentials-error {
            margin-bottom: 1rem;
            text-align: center;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            font-weight: 500;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Login Logo" class="login-logo">
        <h2>Portal Publik Login</h2>

        @if ($errors->has('credentials'))
            <div class="credentials-error">
                {{ $errors->first('credentials') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username">
                @error('username')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>
        <div style="margin-top:1.5rem; color:#888; font-size:0.95em;">
            <span>Tips: Password minimal 3 karakter dan harus ada huruf kapital.</span>
        </div>
    </div>
</body>
</html>