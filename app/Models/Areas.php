<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    protected $table='areas';

    protected $primaryKey='ID';

    public $timestamps=false;

    protected $fillable =[
        'Nombre',
        'Descripcion'
    ];

    protected $guarded =[

    ];
}
