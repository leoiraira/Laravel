@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Alumnos Laravel</title>
    <!--<style>body {
   margin: auto;
   padding: 50px;
}
input[type=text], select {
   width: 100%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
}
input[type=submit] {
   width: 100%;
   background-color: #4CAF50;
   color: white;
   padding: 14px 20px;
   margin: 8px 0;
   border: none;
   border-radius: 4px;
   cursor: pointer;
}
input[type=submit]:hover {
   background-color: #45a049;
}
 div {
   border-radius: 5px;
   background-color: #f2f2f2;
   padding: 20px;
}</style>-->
  </head>
  <body>
     <a href="/alumnos">Ver listado de alumnos</a>
      <h2>
         Nuevo alumno
      </h2>
      <div>
      <form action="/alumnos/crearAsig"  method ="POST" enctype="multipart/form-data" >
    @for ($i = 0; $i < 5; $i++)
    <input name="asignatura[]" value="" type="text">
    <br>
    @endfor
    <input type="submit" value="Guardar">
</form>

</div>
  </body>
</html>
@endsection