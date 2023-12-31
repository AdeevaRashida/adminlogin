<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';
    protected $guarded = ['id_artikel'];
    public $timestamps = false;

    protected $fillable = [
        'description', 'title', 'image', 'isi', 'tanggal'
    ];
}
