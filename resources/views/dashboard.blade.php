<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            margin: 0;
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        .sidebar ul li a:hover {
            color: #d1e7fd;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
        }

        .content h1 {
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Restoran</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{route('orders.index')}}"><i class="fas fa-user"></i> Order</a></li>
            <li><a href="{{ route('menus.index') }}"><i class="fas fa-cog"></i> Menu</a></li>
            <li><a href="{{('logout')}}"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Selamat Datang di Dashboard</h1>
        <p>Ini adalah konten dashboard Anda. Anda bisa menambahkan lebih banyak komponen di sini.</p>
    </div>
</div>

</body>
</html>