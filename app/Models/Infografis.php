<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infografis extends Model
{
    use HasFactory;

    protected $table = 'infografis';
    protected $guarded = ['id_infografis'];

    protected $fillable = [
        'description', 'image'
    ];
}
