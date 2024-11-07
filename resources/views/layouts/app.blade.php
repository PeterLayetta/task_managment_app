<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Task Management</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="bg-gray-800 p-4 text-white">
        <h1>Task Management App</h1>
        <nav>
            <a href="{{ route('tasks.index') }}">All Tasks</a>
            <a href="{{ route('tasks.create') }}">Add Task</a>
        </nav>
    </header>
    <main class="p-4">
        @yield('content')
    </main>
</body>
</html>
