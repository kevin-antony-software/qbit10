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
    <form action="{{ route('comments.update', $comment->id) }}" method="post">
        @csrf @method('PUT')
        <select name="issue_id" id="issue_id">
            @foreach ($issues as $issue)
                <option value="{{ $issue->id }}" @if ($comment->issue_id == $issue->id) @selected(true) @endif>
                    {{ $issue->title }}</option>
            @endforeach
        </select>

        <input type="text" name="body" id="body" value="{{ $comment->body }}">

        <button type="submit">Submit</button>
    </form>

</body>

</html>