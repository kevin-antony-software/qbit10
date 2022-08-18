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

        <form action="{{ route('imagesNew.store') }}" method="post" enctype="multipart/form-data">
            @csrf

        <input type="file" name="image" id = "image">
        <input type="text" id="imagable_type" name="imagable_type" placeholder="imagable_type">
        <input type="number" id="imagable_id" name="imagable_id" placeholder="imagable_id">
        <button type="submit">Submit</button>

    </form>

</body>

</html>
