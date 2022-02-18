<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Asignatura;
use Exception;
// no me funcionaba el db 2hrs perdidas//
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessTimedOutException;

class AlumnoController extends Controller
{ 
        protected $alumnos;
   public function __construct(Alumno $alumnos)
{
    $this->alumnos = $alumnos;
}
  /** 
    @return \Illuminate\Http\Response
    */
    public function index()
{
    $alumnos = $this->alumnos->obtenerAlumnos();
    return view('alumnos.lista', ['alumnos' => $alumnos]);
}

public function create()
{    
    return view('alumnos.crear');
}

public function store(Request $request)
{
   //ACA  se toman todos los datos//
 //$alumno = new Alumno($request->all());// 
 
 $params = $request->all();
 $asignatura = isset($params['asignatura'])? $params['asignatura'] : [];
 ///////////////////////////////////////
 $alumno = new Alumno($request->all());
 $asignatura = isset($params['asignatura'])? $params['asignatura'] : [];
 $alumno->save();
 if (count($asignatura)){
    foreach($asignatura as $asig){
        $new_asig = new \App\Models\Asignatura; // CREAR MODELO php artisan make:model Asignatura
        $new_asig->asignatura = $asig;
        $new_asig->alumno_id = $alumno->id;
        $new_asig->save();
    }
}

 return redirect()->action([AlumnoController::class, 'index']);
    
/*atributo por atributo//
    $alumno = new Alumno;
    $alumno->nombre =$request->input('nombre');
    $alumno->nombre =$request->input('apellido');
    $alumno->nombre =$request->input('edad');
    $alumno->nombre =$request->input('direccion');
*/
    
    try{
            
        DB::beginTransaction();
  
       // if($request->hasFile('documento')){
            $archivo=$request->file('documento');
           
            $archivo->move(storage_path().'/storage/app/public',$archivo->getClientOriginalName());
            $alumno->documento=$archivo->getClientOriginalName();
           // $archivo = 'prefijo'.date('YdmHis').$request->file('documento')->getClientOriginalName();//
            
       // }
        $alumno->save();//guardar de la base de datos ojo , con los forms//
        DB::comit();
    }
    catch(Exception $e){
        DB::rollback();
        
    }
    if (count($asignatura)){
        foreach($asignatura as $asig){
            $new_asig = new \App\Models\Asignatura; // CREAR MODELO php artisan make:model Asignatura
            $new_asig->asignatura = $asig;
            $new_asig->alumno_id = $alumno->id;
            $new_asig->save();
        }
    }
    return redirect()->action([AlumnoController::class, 'index']);
    
}

public function show($id)
{
    $alumno = $this->alumnos->obtenerAlumnoPorId($id);//alumno es mi id
    
    //$id_1=$this->asignatura->obtenerIdAlumno($id);
   $asignaturas = Asignatura::where('alumno_id', $id)->get();

   //dd($asignaturas);

    //$asignatura= $this->asignatura->obtenerIdAlumno($id);//tengo la id alumno
    /*$asignatura[]=['lenguaje','lenguaje','lenguaje','lenguaje','lenguaje'];
    $id_asignatura1[]=[];


    //$asignatura= $this->asignatura->obtenerAsignaturaPorId($id);//esto se pasa null //
    for ($id = 1; $id <= 5; $id++) {

        $id_asignatura1[$id];
        echo $id;
    }*/
    return view('alumnos.ver', ['alumno' => $alumno, 'asignaturas' => $asignaturas]);//asignatura tiene que ser un array
    ///return view('alumnos.ver', ['alumno' => $alumno]);
}
public function edit($id)
{
    $alumno = $this->alumnos->obtenerAlumnoPorId($id);
    $asignaturas = Asignatura::where('alumno_id', $id)->get();
    return view('alumnos.editar', ['alumno' => $alumno],['asignaturas' => $asignaturas]);
}
public function update(Request $request, $id)
{    
    $alumno = Alumno::find($id);
    $alumno->fill($request->all());
    $alumno->save();
    $arr_asignaturas = isset($params['asignatura'])? $params['asignatura'] : [];
    $arr_asignatura_id = isset($params['asignatura_id'])? $params['asignatura_id'] : [];

   foreach ($arr_asignatura_id as $indice_arr => $asignatura_id) {

        $upd_asig = \App\Models\Asignatura::where('id', $asignatura_id)->first();

        $upd_asig->nombre = isset( $$arr_asignaturas[$indice_arr]) ? $$arr_asignaturas[$indice_arr]:'';

        $upd_asig->alumno_id = $alumno->id;

        $upd_asig->save();

    }
  
        
   
    return redirect()->action([AlumnoController::class, 'index']);
}
public function destroy($id)
{
    $alumno = Alumno::find($id);
    $alumno->delete();
   
    return redirect()->action([AlumnoController::class, 'index']);
}



}


     




