<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Type\FalseType;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = "asignatura";
    protected $hidden = ['id'];
    protected $primarykey='id';
   
    protected $fillable = ['asignatura','id','alumno_id'];


    public function obtenerAsignatura()
{
    return Asignatura::all();
}
public function obtenerAsignaturaPorId($id)
{
    return Asignatura::find($id);
}
public function obtenerIdAlumno($alumno_id)
{
    return Asignatura::find($alumno_id);
}
}
