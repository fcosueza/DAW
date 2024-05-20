@extends('layouts.base')
@section('titulo','Lista de ubicaciones')
@section('content')
    <table>
        <thead>
            <tr>
                <th>Id</th><th>Nombre</th><th>Descripcion</th><th>Días</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ubicaciones as $ubicacion)
            <tr>
                <td>{{$ubicacion->id}}</td>
                <td>{{$ubicacion->nombre}}</td>
                <td>{{$ubicacion->descripcion}}</td>
                <td>{{$ubicacion->dias}}</td>
                <td>
                    <a href="{{route('ubicaciones.show',['ubicacion'=>$ubicacion->id])}}" role="button-sm">Detalle ubicación</a>
                    <a href="{{route('ubicaciones.edit',['ubicacion'=>$ubicacion->id])}}" role="button-sm">Editar ubicación</a>
                    <a href="{{route('ubicaciones.destroyconfirm',['ubicacion'=>$ubicacion->id])}}" role="button-sm">Borrar ubicación</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
