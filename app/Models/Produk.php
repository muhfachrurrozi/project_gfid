<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produks";
    protected  $primaryKey = "id";
    protected $fillable = [
        'item',
        'deskripsi',
        'bahan',
        'lbahan',
        'drawing',
        'routing',
        'kg',
    ];
}