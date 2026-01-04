<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error {{ $code ?? 404 }}</title>

    <!-- Google Font Arvo -->
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arvo', serif;
            background: url('{{ asset("assets/images/backgrounds/batik.png") }}') repeat;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .overlay {
            background-color: rgba(212, 212, 212, 0.699); /* soft cream semi-transparent */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
            text-align: center;
        }

        .page_error {
            max-width: 400px;
            width: 100%;
        }

        .error_code {
            font-size: 3rem;
            font-weight: 600;
            color: #6B4C3B; /* coklat batik */
            margin-bottom: 20px;
        }

        .error_bg img {
            width: 100%;
            max-width: 300px;
            height: auto;
            margin-bottom: 25px;
        }

        .content_box h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #6B4C3B;
        }

        .content_box p {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #555;
        }

        .chat_cs {
            color: #fff !important;
            padding: 10px 25px;
            background: #6B4C3B;
            display: inline-block;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .take_dev {
            color: #000000 !important;
            padding: 5px 15px;
            background: #a0a0a0;
            display: inline-block;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .chat_cs:hover {
            background: #563724;
        }
    </style>
</head>

<body>
    <div class="overlay">
        <div class="page_error">
            <!-- Kode error -->
            <div class="error_code">Mobile ONLY!</div>

            <!-- Gambar -->
            <div class="error_bg">
                <img src="{{ asset('assets/images/resources/MinXO-moan.webp') }}" alt="Error Image">
            </div>

            <!-- Pesan -->
            <div class="content_box">
                <h3>
                   This page exists, but it can only be accessed from a mobile device.

                </h3>
                <p>
                Please switch to a mobile device to continue browsing this site.

                </p>
                <div class="take_dev">Take your device</div>
                <a href="{{ route('home') }}" class="chat_cs">Chat CS</a>
            </div>
        </div>
    </div>
</body>

</html>
