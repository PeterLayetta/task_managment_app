<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<h2 class="text-2xl font-bold mb-4">All Tasks</h2>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Task</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>
                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">Edit</a>
                <a href="{{ route('tasks.show', $task) }}" class="text-green-500">View</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
