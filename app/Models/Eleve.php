<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'name',
        'prenom',
        'mother_name',
        'father_name',
        'Adresse',
        'birth_date',
    ];
}
