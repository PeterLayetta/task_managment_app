<!-- resources/views/tasks/show.blade.php -->
@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<h2 class="text-2xl font-bold mb-4">{{ $task->title }}</h2>

<p><strong>Status:</strong> {{ $task->status }}</p>
<p><strong>Description:</strong> {{ $task->description }}</p>

<a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">Edit Task</a>
<a href="{{ route('tasks.index') }}" class="text-gray-500">Back to Tasks</a>
@endsection
