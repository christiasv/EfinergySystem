<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table='empresas';

    protected $primaryKey='ID';

    public $timestamps=false;

    protected $fillable =[
        'Nombre',
        'Descripcion'
    ];

    protected $guarded =[

    ];
}
