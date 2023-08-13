<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scrap extends Model
{
    use HasFactory;

    protected $table = "scraps";
    protected  $primaryKey = "id";
    protected $fillable = [
        'name',
        'shift',
        'kg',
        'so',
        'karung',
    ];
}