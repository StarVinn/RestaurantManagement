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
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        padding: 20px;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidebar h2 {
        margin: 0;
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        width: 100%;
    }

    .sidebar ul li {
        margin: 20px 0;
        text-align: center;
    }

    .sidebar ul li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
        padding: 10px 0;
        border-radius: 10px;
    }

    .sidebar ul li a i {
        margin-right: 10px;
        font-size: 20px;
        transition: transform 0.3s ease;
    }

    .sidebar ul li a:hover {
        color: #d1e7fd;
        background-color: rgba(255, 255, 255, 0.2);
    }

    .sidebar ul li a:hover i {
        transform: scale(1.2);
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
        margin-bottom: 20px;
    }

    /* Optional Scrollbar for Sidebar */
    .sidebar {
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #0056b3 #ffffff;
    }

    .sidebar::-webkit-scrollbar {
        width: 8px;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: #0056b3;
        border-radius: 10px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: #ffffff;
    }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
        }

        .table thead th {
            background-color: #007bff;
            border-collapse: collapse;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .table tbody tr {
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }

        .table tbody tr:hover {
            background-color: #d1e7fd;
        }

        .table tbody td {
            border-bottom: 1px solid #ddd;
        }

        .btn {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Restoran</h2>
        <ul>
            <li><a href="{{('/home')}}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{route('orders.index')}}"><i class="fas fa-solid fa-cash-register"></i> Order</a></li>
            <li><a href="{{ route('menus.index') }}"><i class="fas fa-bars"></i> Menu</a></li>
            <li><a href="{{('logout')}}"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Selamat Datang di Order</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; color: white; padding: 10px; border-radius: 5px;">Add Order</a>

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
                        <td>{{ $order->menu->price }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-info">Details</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
