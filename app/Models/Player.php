<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birthdate',
        'team_id',
        'token'
    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}