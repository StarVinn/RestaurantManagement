<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }

        .form-container .mb-3 {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-container input:focus, .form-container select:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #218838;
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .form-container a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Create Order</h2>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" id="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="menu_id" class="form-label">Menu</label>
                <select name="menu_id" id="menu_id" class="form-select" required>
                    <option value="">Select Menu</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }} - Rp.{{ $menu->price }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="order_date" class="form-label">Order Date</label>
                <input type="datetime-local" name="order_date" class="form-control" id="order_date" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <a href="{{route('menus.index')}}">Back</a>    
    </div>
</body>
</html>
