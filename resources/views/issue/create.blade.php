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
    <form action="{{ route('issues.store') }}" method="post">
        @csrf

        <input type="text" id="title" name="title" placeholder="title">
        <input type="text" name="body" id="body" placeholder="body">
        <input type="text" id="uuid" name="uuid" placeholder="uuid">
        <input type="text" name="slug" id="slug" placeholder="slug">
        <button type="submit">Submit</button>
    </form>

</body>

</html>
