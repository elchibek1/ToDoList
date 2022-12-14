<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'status'];
    public const NEW = 'new';
    public const INPROGRESS = 'in_progress';
    public const DONE = 'done';
}
