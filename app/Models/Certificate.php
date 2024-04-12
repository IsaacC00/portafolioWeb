<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // a la variable casts le decinmos que no sea un string sino un date 
    protected $casts = ['fecha_certificado'=>'date'];
    protected $fillable=['tipo_certificado','inst_certificado','desc_certificado','fecha_certificado'];
}
