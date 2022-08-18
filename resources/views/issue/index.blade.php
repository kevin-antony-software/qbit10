<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
</head>

<body>
    <table>
        @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->title }}</td>

                @foreach ( $issue->comments as $comment)
                <td>{{ $comment->id }}</td>
                @endforeach
               
                <td>
                    <a href="{{ route('issues.show', $issue->id) }}" class="fas fa-eye"></a>
                    <a href="{{ route('issues.edit', $issue->id) }}" class="far fa-edit"></a>

                    <form action="{{ route('issues.destroy', $issue->id ) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
