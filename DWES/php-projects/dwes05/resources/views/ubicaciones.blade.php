@extends('layouts.base')

@section('titulo','Lista de ubicaciones')

@section('content')
<table class="table">
    <thead class="table__head">
        <tr>
            <th class="table__cell">Id</th>
            <th class="table__cell">Nombre</th>
            <th class="table__cell">Descripcion</th>
            <th class="table__cell">Días</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($ubicaciones as $ubicacion)
        <tr>
            <td class="table__cell">{{$ubicacion->id}}</td>
            <td class="table__cell">{{$ubicacion->nombre}}</td>
            <td class="table__cell">{{$ubicacion->descripcion}}</td>
            <td class="table__cell">{{$ubicacion->dias}}</td>

        </tr>
            @endforeach
    </tbody>
</table>
@endsection

