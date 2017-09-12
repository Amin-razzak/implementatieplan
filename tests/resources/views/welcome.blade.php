<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>

    </head>
    <body>
        @foreach($tasks as $task)
                <li>{{$task->body}}</li>
        @endforeach
    </body>
</html>
