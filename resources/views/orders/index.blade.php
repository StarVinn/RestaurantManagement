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
        /* Styling for Add Menu Button */
    .add-menu-btn {
        margin-bottom: 10px;
    }

    .add-menu-btn a {
        display: inline-block;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        padding: 12px 20px;
        color: white;
        background-color: #007BFF; /* Green color for the button */
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .add-menu-btn a:hover {
        background-color: #005dc1; /* Darker green on hover */
    }

    /* Updated Table Styling */
    .table {
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table thead {
        background-color: #007BFF;
        color: white;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #d1e7fd;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 5px;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-info {
        background-color: #FFC107;
        color: white;
    }

    .btn-info:hover {
        background-color: #FFB400;
    }

    .btn-danger {
        background-color: #DC3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #C82333;
    }

    .btn-primary {
        background-color: #007BFF;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>
<div class="container">
    <nav class="sidebar" role="navigation">
        <h2>Restoran</h2>
        <ul>
            <li><a href="{{ url('/home') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('orders.index') }}"><i class="fas fa-cash-register"></i> Order</a></li>
            <li><a href="{{ route('menus.index') }}"><i class="fas fa-bars"></i> Menu</a></li>
            <li><a href="{{ url('logout-page') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h1>Welcome to Order</h1>
        <p>You Can Order Food and Drinks Here</p>
        <div class="table">
            <div class="add-menu-btn">
                <a href="{{ route('orders.create') }}">Add Order</a>
            </div>

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
