<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'batchs';
    protected $fillable = [
        'name_batch',
        'begin_hour',
        'end_hour'
    ];
}
