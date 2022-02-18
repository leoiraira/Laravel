<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Type\FalseType;

class Alumno extends Model
{
    use HasFactory;
   
    protected $table = "alumnos";
    protected $hidden = ['id'];
    protected $primarykey='id';
   
    protected $fillable = ['nombre', 'apellido', 'edad', 'direccion','documento'];


    public function obtenerAlumnos()
{
    return Alumno::all();
}
public function obtenerAlumnoPorId($id)
{
    return Alumno::find($id);
}
}
