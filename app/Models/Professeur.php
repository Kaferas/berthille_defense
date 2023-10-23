<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prenom',
        'email',
        'phone_number',
        'cni_number',
        'adresse',
    ];
}
