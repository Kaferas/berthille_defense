<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_bouquet',
        'price_bouquet'
    ];
}
