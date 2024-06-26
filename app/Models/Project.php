<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'id_user_owner'];

    public function users() :BelongsToMany{ 
        return $this->belongsToMany(User::class)->withPivot('project_id', 'user_id', 'role');
    }

    public function todos() :HasMany{
        return $this->hasMany(Todo::class)->orderBy('order');
    }
}
