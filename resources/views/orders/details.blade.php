<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .receipt {
            width: 300px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt h1 {
            text-align: center;
            font-size: 20px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .receipt hr {
            border: none;
            border-top: 1px dashed #ccc;
            margin: 10px 0;
        }

        .receipt p {
            font-size: 14px;
            margin: 5px 0;
        }

        .receipt p strong {
            display: inline-block;
            width: 120px;
        }

        .receipt .total {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
        }

        .receipt .btn {
            display: block;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .receipt .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="receipt">
    <h1>Order Receipt</h1>
    <hr>
    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Menu:</strong> {{ $order->menu->name }}</p>
    <p><strong>Price:</strong> Rp.{{ $order->menu->price }}</p>
    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
    <hr>
    <p class="total">Total: Rp.{{ $order->total_price }}</p>
    <a href="{{ route('orders.index') }}" class="btn">Back to Orders</a>
</div>

</body>
</html>
