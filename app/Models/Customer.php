<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";
    protected  $primaryKey = "id";
    protected $fillable = [
        'cs_name',
        'cs_email',
        'cs_phone',
        'cs_alamat',
        'cs_pax',
    ];
}