<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Tampilkan daftar semua tugas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Tampilkan formulir untuk membuat tugas baru
    public function create()
    {
        return view('tasks.form');
    }

    // Simpan tugas baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        Task::create([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description ?? '', // Jika ada field deskripsi
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Tampilkan detail tugas tertentu
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Tampilkan formulir untuk mengedit tugas
    public function edit(Task $task)
    {
        return view('tasks.form', compact('task'));
    }

    // Update tugas yang ada di database
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description ?? '',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Hapus tugas dari database
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
