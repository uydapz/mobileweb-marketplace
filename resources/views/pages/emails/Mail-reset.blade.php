<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset Password NDEXO</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #fefefe 0%, #f7f7f7 100%);
            color: #444444;
            margin: 0;
            padding: 40px 15px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .email-container {
            max-width: 520px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 16px 30px rgba(185, 28, 28, 0.15);
            padding: 40px 35px 35px;
            border-top: 6px solid #b91c1c;
            text-align: center;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 140px;
            height: auto;
        }

        h1 {
            color: #b91c1c;
            font-weight: 600;
            font-size: 2.25rem;
            margin-bottom: 0.3em;
            letter-spacing: 1px;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
            margin: 1em 0;
            color: #555;
            text-align: left;
        }

        a.button {
            display: inline-block;
            background-color: #b91c1c;
            color: #fff !important;
            padding: 14px 28px;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 6px 12px rgba(185, 28, 28, 0.4);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            font-size: 1.1rem;
            margin-top: 25px;
            text-align: center;
        }

        a.button:hover {
            background-color: #7f1212;
            box-shadow: 0 8px 18px rgba(127, 18, 18, 0.6);
        }

        .footer {
            margin-top: 40px;
            font-size: 13px;
            color: #999999;
            text-align: center;
            font-style: italic;
            letter-spacing: 0.5px;
        }

        @media (max-width: 600px) {
            .email-container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            a.button {
                padding: 12px 22px;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="email-container" role="main" aria-label="Reset Password Email for NDEXO">
        <div class="logo">
            <!-- Ganti src ini dengan URL logo kamu -->
            <img src="https://dapzgank.my.id/favicon.png" alt="Logo NDEXO" />
        </div>
        <h1>Reset Password</h1>
        <p>Hay XOlovers,</p>
        <p>MinXO nerima permintaan buat kamu atur ulang password akun kamu di <strong>NDEXO</strong>.</p>
        <p>Untuk mengganti password, silakan klik tombol di bawah ini:</p>
        <a href="{{ $resetUrl }}" class="button" target="_blank" rel="noopener noreferrer">Reset Password</a>
        <p>Biarin tombolnya diem ya, kalo kamu ga kirim permintaan😀👌</p>
        <p>Regard,<br /><strong>MinXO</strong></p>
        <div class="footer">
            © {{ date('Y') }} NDEXO. Semua hak dilindungi.
        </div>
    </div>
</body>

</html>
