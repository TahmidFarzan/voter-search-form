<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voter extends Model
{
    use HasFactory;

    protected $table = 'voters';

    protected $fillable = [
        'no',
        'name',
        'upazilla',
        'union',
        'father_name',
        'mother_name',
        'date_of_birth',
        'profession',
        'address',
        'gender',
    ];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
