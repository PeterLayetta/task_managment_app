<!-- resources/views/tasks/form.blade.php -->
@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
<h2 class="text-2xl font-bold mb-4">{{ isset($task) ? 'Edit Task' : 'Add New Task' }}</h2>

<form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">
    @csrf
    @if(isset($task))
        @method('PUT')
    @endif
    <div class="mb-4">
        <label for="title" class="block">Task Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $task->title ?? '') }}" required class="w-full p-2 border border-gray-300">
    </div>
    <div class="mb-4">
        <label for="status" class="block">Status</label>
        <select name="status" id="status" required class="w-full p-2 border border-gray-300">
            <option value="Pending" {{ (isset($task) && $task->status == 'Pending') ? 'selected' : '' }}>Pending</option>
            <option value="In Progress" {{ (isset($task) && $task->status == 'In Progress') ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ (isset($task) && $task->status == 'Completed') ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white p-2">{{ isset($task) ? 'Update Task' : 'Create Task' }}</button>
</form>
@endsection
