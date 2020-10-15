<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class persona extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "personas";

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'genero',
        'peso',
        'estatura',
        'nivel_actividad',
        'calorias_diarias',
        'bmi',
        'bmi_categoria',
        'bmr'
    ];
}
