<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    protected $table = "mesins";
    protected  $primaryKey = "id";
    protected $fillable = [
        'aset',
        'name',
        'label',
        'spek',
        'wi',
    ];
}