<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voter extends Model
{
    use HasFactory;

    protected $table = 'voters';

    protected $fillable = [
        'voter_no',
        'name',
        'upazilla',
        'union',
        'father_name',
        'mother_name',
        'date_of_birth',
        'profession',
        'address',
        'gender',
        'vote_center'
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
