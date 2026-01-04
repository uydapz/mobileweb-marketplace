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
            background: url('{{ asset('assets/images/backgrounds/batik.png') }}') repeat;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .overlay {
            background-color: rgba(212, 212, 212, 0.699);
            /* soft cream semi-transparent */
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
            font-size: 4rem;
            font-weight: 600;
            color: #6B4C3B;
            /* coklat batik */
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

        .link_home {
            color: #fff !important;
            padding: 10px 25px;
            background: #6B4C3B;
            display: inline-block;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .link_home:hover {
            background: #563724;
        }

        @media (max-width: 480px) {
            .error_code {
                font-size: 3rem;
            }

            .error_bg img {
                max-width: 200px;
            }

            .content_box h3 {
                font-size: 1.2rem;
            }

            .content_box p {
                font-size: 0.95rem;
            }

            .link_home {
                padding: 8px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="overlay">
        <div class="page_error">
            <!-- Kode error -->
            <div class="error_code">{{ $code ?? 404 }}</div>

            <!-- Gambar -->
            <div class="error_bg">
                <img src="{{ asset('assets/images/resources/MinXO-confused.webp') }}" alt="Error Image">
            </div>

            <!-- Pesan -->
            <div class="content_box">
                <h3>
                    @if (($code ?? 404) == 404)
                        Oops... Lost your way? 😅
                    @elseif (($code ?? 500) == 500)
                        Server is having issues 🤕
                    @elseif (($code ?? 403) == 403)
                        Access denied 🚫
                    @else
                        Something went wrong...
                    @endif
                </h3>
                <p>
                    @if (($code ?? 404) == 404)
                        The page you are looking for cannot be found.
                    @elseif (($code ?? 500) == 500)
                        There is a problem on the server. Please try again later.
                    @elseif (($code ?? 403) == 403)
                        You do not have permission to access this page.
                    @else
                        Don’t worry, try going back to the homepage.
                    @endif
                </p>

                <a href="{{ route('home') }}" class="link_home">Help Me</a>
            </div>
        </div>
    </div>
</body>

</html>
