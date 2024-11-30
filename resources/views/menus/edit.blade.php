<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="{{ route('menus.update', $menu) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Menu</h1>

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $menu->name }}" required>
        </div>

        <!-- Price Field -->
        <div class="mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ $menu->price }}" required>
        </div>

        <!-- Description Field -->
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ $menu->description }}</textarea>
        </div>

        <!-- Category Field -->
        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit">Update</button>
    </form>

    <!-- Back Link -->
    <a href="{{ route('menus.index') }}" class="btn-back">Back</a>
</body>
</html>
