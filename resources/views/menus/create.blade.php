<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <form action="{{route('menus.store')}}" method="POST" style="background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 400px; margin: auto;">
        @csrf
        <h1 style="text-align: center; color: #333;">Create Menu</h1>

        <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
        <input type="text" name="name" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="price" style="display: block; margin-bottom: 5px;">Price:</label>
        <input type="number" name="price" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="description" style="display: block; margin-bottom: 5px;">Description:</label>
        <textarea name="description" cols="30" rows="5" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;"></textarea>

        <label for="category_id" style="display: block; margin-bottom: 5px;">Category:</label>
        <select name="category_id" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; background-color: white; appearance: none; cursor: pointer;">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">Create</button>
    </form>
    <a href="{{route('menus.index')}}" style="display: block; text-align: center; margin-top: 20px; color: #007bff; text-decoration: none;">Back</a>
</body>
</html>
