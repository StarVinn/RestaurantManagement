<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        /* Container for content */
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Heading */
        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        /* Buttons container */
        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        /* Button styles */
        button, a {
            padding: 12px 25px;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Logout button */
        .logout-button {
            background-color: #e74c3c;
            color: white;
        }

        .logout-button:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        /* Back button */
        .back-button {
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }
    </style>
    <script>
        function confirmLogout(event) {
            event.preventDefault(); // Prevent form submission
            if (confirm("Are you sure you want to logout?")) {
                event.target.closest('form').submit(); // Submit form if confirmed
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Are you sure you want to logout?</h1>
        <div class="buttons">
            <a href="{{ url()->previous() }}" class="back-button">Back</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button" onclick="confirmLogout(event)">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
