<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = "stoks";
    protected  $primaryKey = "id";
    protected $fillable = [
        'dept',
        'pic',
        'deskripsi',
        'size',
        'qty',
        'mesin',
        'lokasi',
        'remak',
        'poto',
    ];
}
