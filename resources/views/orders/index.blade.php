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
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h2 {
            font-size: 26px;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 10px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .content {
            flex: 1;
            padding: 30px;
            background-color: #ffffff;
            overflow-y: auto;
        }

        .content h1 {
            color: #007bff;
            font-size: 32px;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #d1e7fd;
        }

        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="sidebar" role="navigation">
        <h2>Restoran</h2>
        <ul>
            <li><a href="{{ url('/home') }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{ route('orders.index') }}"><i class="fas fa-cash-register"></i> Order</a></li>
            <li><a href="{{ route('menus.index') }}"><i class="fas fa-bars"></i> Menu</a></li>
            <li><a href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </nav>

    <main class="content">
        <h1>Selamat Datang di Order</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

        <a href="{{ route('orders.create') }}" class="btn btn-info">Add Order</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Menu</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->menu->name }}</td>
                        <td>Rp {{ number_format($order->menu->price, 2) }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>Rp {{ number_format($order->menu->price, 2) }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-info">Details</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>
</body>
</html>
