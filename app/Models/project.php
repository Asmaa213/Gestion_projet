<?php

namespace App\Models;

use App\Models\team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status',
        'startdate',
        'enddate',
    ];

    public function team()
    {
        return $this->belongsTo(team::class);
    }
}
