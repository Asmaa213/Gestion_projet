<?php

namespace App\Models;

use App\Models\User;
use App\Models\project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function projects()
    {
        return $this->hasMany(project::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user');
    }
}
