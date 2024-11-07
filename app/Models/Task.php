<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'title',
        'status',
        'description',
    ];

    // Tambahkan atribut default untuk status jika diperlukan
    protected $attributes = [
        'status' => 'Pending', // Set default status menjadi 'Pending'
    ];
}
