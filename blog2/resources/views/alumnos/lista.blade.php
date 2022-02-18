@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Alumnos Laravel</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Archivo CSS Bootstrap 5 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>
                Listado de alumnos
            </h2>
            <table class="table table-striped">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>
                        <!-- {{ $alumno->apellido }}-->
                    </td>
                    <td>
                        <!-- {{ $alumno->edad }}-->
                    </td>
                    <td>
                        <!-- {{ $alumno->direccion }}-->
                    </td>
                    <td>
                        <a href="/alumnos/ver/{{$alumno->id}}"><button type="button" class="btn btn-outline-info">ver</button></a>
                        <a href="/alumnos/editar/{{$alumno->id}}"><button type="button" class="btn btn-outline-warning">Editar</button></a>
                        <a href="/alumnos/eliminar/{{$alumno->id}}" onclick="return eliminarAlumno('Eliminar Alumno')"> <button type="button" class="btn-outline-danger"> Eliminar</button></a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col">
            <a href="/alumnos/crear"> <button type="button" class="btn btn-primary btn-lg"> Ingresar Nuevo alumno</button></a> 
                
            </div>
            
                      
            
            </div>
        </div>
    </div>
</body>
<script>
    function eliminarAlumno(value) {

        action = confirm(value) ? true : event.preventDefault()
    }
</script>

</html>
@endsection