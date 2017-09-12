<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>

    </head>
    <body>
        @foreach($tasks as $task)
                <li>

                    <a href="/tasks/{{$task->id}}">

                            {{$task->body}}

                    </a>

                </li>
        @endforeach
    </body>
</html>
