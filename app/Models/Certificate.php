<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // a la variable casts le decinmos que no sea un string sino un date 
    protected $fillable=['nombre_servicio','desc_servicio','imagen'];
}
