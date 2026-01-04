<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('msg.ndexo') }} | {{ $title ?? '' }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logos/favicon.webp') }}" />
    <link rel="shortcut icon" type="image/webp" href="{{ asset('assets/images/logos/favicon.webp') }}" />

    <link rel="stylesheet" href="{{ asset('adsets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <!-- Helpers -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            --primary: #543310;
            --primary-light: #7a5c3a;
            --primary-blue: #277ceb;
            --secondary: #3a2410;
            --accent: #a67c52;
            --light: #f8f5f1;
            --dark: #2a1a0a;
            --dark-light: #5a4a3a;
            --white: #ffffff;
            --danger: #d9534f;
            --success: #5cb85c;
            --gray-light: #e9e5e0;
        }

        * {
            user-select: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: url('{{ asset('assets/images/bg-login.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .text-primary {
            color: var(--primary-blue);
            text-decoration: none;
        }

        .text-dark {
            color: var(--dark);
            text-decoration: none;
        }

        .text-secondary {
            color: var(--secondary);
            text-decoration: none;
        }

        .text-success {
            color: var(--success);
            text-decoration: none;
        }

        .text-danger {
            color: var(--danger);
            text-decoration: none;
        }

        .login-container {
            position: relative;
            width: 100%;
            max-width: 500px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            padding: 50px 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h1 {
            font-size: 28px;
            color: var(--dark);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .login-header p {
            color: var(--dark-light);
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--dark);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border-radius: 12px;
            font-size: 14px;
            color: var(--dark);
            background: var(--white);
            border: 1px solid var(--gray-light);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .bottom-links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 13px;
        }

        .bottom-links a {
            color: var(--primary);
            text-decoration: none;
        }

        .bottom-links a:hover {
            text-decoration: underline;
        }

        .social-login {
            margin-top: 30px;
            text-align: center;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--white);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            cursor: pointer;
        }

        @media (max-width: 480px) {
            .login-container {
                border-radius: 0;
                padding: 40px 20px;
            }

            .login-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        {{ $slot }}
    </div>
    <script src="{{ asset('adsets/vendor/js/bootstrap.js') }}"></script>
</body>

</html>
