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
    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <select name="issue_id" id="issue_id">
            @foreach ($issues as $issue)
                <option value="{{ $issue->id }}">{{ $issue->title }}</option>
            @endforeach
        </select>
        <input type="text" name="body" id="body" placeholder="body">
        <button type="submit">Submit</button>
    </form>

</body>

</html>
