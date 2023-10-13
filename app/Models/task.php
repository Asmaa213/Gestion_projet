<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'description',
        'status',
        'enddate',
    ];
    public function user() 
    {
        return  $this->belongsTo(User::class);
    }
}
