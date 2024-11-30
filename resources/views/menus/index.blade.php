<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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
        .table table {
        border: 1px solid #ddd;
    }
    .table th, .table td {
        text-align: left;
        border: 1px solid #ddd;
    }

    /* Hover Effect for Rows */
    .table tbody tr:hover {
        background-color: #D6E9F9;
    }

    /* Hover Effect for Buttons */
    .btn {
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }
    .btn-warning {
        background-color: #FFC107;
        color: white;
        border: none;
    }
    .btn-warning:hover {
        background-color: #FFB400;
    }
    .btn-danger {
        background-color: #DC3545;
        color: white;
        border: none;
    }
    .btn-danger:hover {
        background-color: #C82333;
    }

    .btn-primary {
        background-color: #007BFF;
        color: white;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    /* Styling the table container */
    .table {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden; /* Prevents content overflow outside the border-radius */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow */
    }

    /* Table header */
    .table thead {
        background-color: #007BFF;
        color: white;
    }

    .table th {
        padding: 12px;
        text-align: left;
    }

    /* Table rows */
    .table tbody tr {
        background-color: #ffffff;
        transition: background-color 0.3s ease; /* Smooth transition on hover */
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2; /* Alternate row color */
    }

    .table tbody tr:hover {
        background-color: #d1e7fd; /* Hover effect */
    }

    /* Table cells */
    .table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    /* Remove bottom border from the last row */
    .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Button styling */
    .btn {
        padding: 5px 12px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        border: none;
        font-size: 14px;
    }

    .btn-warning {
        background-color: #FFC107;
        color: white;
    }

    .btn-warning:hover {
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

    /* Add menu button container */
    .add-menu-btn {
        margin-bottom: 5px;
        display: inline-block;
    }

    .add-menu-btn a {
        text-decoration: none;
        color: white;
        background-color: blue;
        padding: 10px 15px;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }

    .add-menu-btn a:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Restoran</h2>
        <ul>
            <li><a href="{{('home')}}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{route('orders.index')}}"><i class="fas fa-user"></i> Order</a></li>
            <li><a href="{{route('menus.index')}}"><i class="fas fa-cog"></i> Menu</a></li>
            <li><a href="{{('logout')}}"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Selamat Datang di Menu</h1>
        <p>Ini adalah konten dashboard Anda. Anda bisa menambahkan lebih banyak komponen di sini.</p>
        <div class="table">
            <div class="add-menu-btn">
                <a href="{{ route('menus.create') }}">Add Menu</a>
            </div>
        
            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
        
            <table class="table mt-3" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->price }}</td>
                            <td>{{ $menu->description }}</td>
                            <td>{{ $menu->category->name }}</td>
                            <td>
                                <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline-block;">
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
</div>

</body>
</html>