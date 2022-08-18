<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="post">
        @csrf @method('PUT')
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($subcategory->category_id == $category->id) @selected(true) @endif>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        <input type="text" id="name" name="name" value="{{ $subcategory->name }}">
        <input type="text" name="description" id="description" value="{{ $subcategory->description }}">
        <button type="submit">Submit</button>
    </form>

</body>

</html>
