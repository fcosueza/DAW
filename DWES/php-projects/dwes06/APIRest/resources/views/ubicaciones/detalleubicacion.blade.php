@extends('layouts.base')
@section('titulo', 'Formulario para crear ubicaciones')
@section('content')
   <B>Nombre</B>: {{$ubicacion->nombre}}<BR>
   <B>Descripcion</B>: {{$ubicacion->descripcion}}<BR>
   <B>Dias disponible</B>: {{$ubicacion->dias}}<BR>

   <B>Listado de talleres:</B>
   @if ($ubicacion->talleres->count()>0)
   <table border="1">
    <thead>
        <tr><th>Nombre</th><th>Descripcion</th><th>Dia de la semana</th><th>Hora de inicio</th><th>Hora de fin</th><th>Cupo</th></tr>
    </thead>
    <tbody>
   @foreach ($ubicacion->talleres as $taller)
        <tr><td>{{$taller->nombre}}</td><td>{{$taller->descripcion}}</td><td>{{$taller->dia_semana}}</td>
            <td>{{$taller->hora_inicio}}</td><td>{{$taller->hora_fin}}</td><td>{{$taller->cupo_maximo}}</td></tr>
   @endforeach
    </tbody>
   </table>
   @else
       No hay talleres previstos en esta ubicación.
   @endif

@endsection
