<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | UD. Putri Hijau</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            height: 100vh;
            margin: 0;
            background: #f1f8f4;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 15px;
        }

        .login-wrapper {
            display: flex;
            background: white;
            width: 100%;
            max-width: 900px;
            min-height: 520px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        /* LEFT SIDE */
        .left-side {
            flex: 1;
            background: linear-gradient(150deg, #1b5e20 0%, #2e7d32 100%);
            color: white;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .left-side h1 {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 15px;
        }
        .left-side p {
            opacity: 0.95;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* RIGHT SIDE */
        .right-side {
            flex: 1.2;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-side h3 {
            font-weight: 700;
            color: #2e7d32;
        }
        .right-side small {
            color: #777;
        }

        /* INPUT */
        .form-control {
            border: none;
            border-bottom: 2px solid #d0d0d0;
            border-radius: 0;
            padding: 12px 5px;
            transition: border-color 0.25s ease;
            background: transparent;
            font-size: 1rem;
        }
        .form-control:focus {
            outline: none;
            box-shadow: none;
            border-bottom-color: #2e7d32;
        }

        /* BUTTON */
        .btn-login {
            background: #2e7d32;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 12px;
            border: none;
            transition: 0.25s;
        }
        .btn-login:hover {
            background: #1b5e20;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(27, 94, 32, 0.3);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                max-width: 420px;
            }
            .left-side {
                padding: 35px 25px;
                text-align: center;
            }
            .right-side {
                padding: 35px 25px;
            }
        }
    </style>
</head>
<body>

        {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
