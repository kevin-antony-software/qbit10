<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
</head>

<body>
    <h1>Images</h1>
    <table>
        <th>
            <td width = 10% >imagable type</td>
            <td width = 10% >imagable id</td>
            <td width = 10% >image size</td>
            <td width = 10% >image path</td>
            <td width = 10% >image name</td>
            <td width = 10% >image extension</td>
        </th>
        @foreach ($images as $image)
            <tr>
                <td>{{ $image->imagable_type }}</td>
                <td>{{ $image->imagable_id }}</td>
                <td>{{ $image->size }}</td>
                <td>{{ $image->path }}</td>
                <td>{{ $image->name }}</td>
                <td>{{ $image->extension }}</td>
                <td><img width="100px;" src="{{ URL::asset($image->path) }}" /></td>
            </tr>
        @endforeach
    </table>
</body>

</html>
