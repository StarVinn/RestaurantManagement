<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('background.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay for text contrast */
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .btn {
            margin: 10px;
            padding: 10px 30px;
            font-size: 1.2em;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #ff6f61;
            transform: scale(1.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

    </style>
</head>
<body>
    <div class="overlay"></div>
    
    <div class="container">
        <h1>Welcome to Starbhak Restaurant</h1>
        <p>Kami dengan senang hati menyambut Anda untuk menikmati pengalaman kuliner terbaik. Temukan cita rasa istimewa yang kami hadirkan dengan penuh cinta dan dedikasi.</p>
        
        <div>
            @auth
                <a href="{{ route('home') }}" class="btn btn-danger">Home</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            @endauth
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
