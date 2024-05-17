<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable  = ['title', 'todo_id','order'];
    protected $timestamp = true;

    public function todo() : BelongsTo{
        return $this->belongsTo(Todo::class);
    }
}
