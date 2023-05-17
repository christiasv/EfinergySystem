<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table='cargos';

    protected $primaryKey='ID';

    public $timestamps=false;

    protected $fillable =[
        'Nombre',
        'Descripcion'
    ];

    protected $guarded =[

    ];
}
