<?php

namespace App\Models;


use App\Models\Maatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year',
        'token'
    ];
    /*    protected $fillable = ['token']; */



    public function players()
    {
        return $this->hasMany(Player::class);
    }


    public function matches1()
    {
        return $this->belongsToMany(Maatch::class, 'team1_id');
    }

    public function matches2()
    {
        return $this->belongsToMany(Maatch::class, 'team2_id');
    }
}
