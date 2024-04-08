@extends('layouts.base')

@section('titulo', 'Información de Ubicacion')

@section('content')

    <div class="info">
        <strong>Nombre:</strong> {{$ubicacion->nombre}}<br>
        <strong>Descripcion:</strong> {{$ubicacion->descripcion}}<br>
        <strong>Dias Semana:</strong> {{$ubicacion->dias}}<br>

        <br>
        <strong>Lista de Talleres: </strong>
    </div>
    <table class="table">
        <thead class="table__head">
            <tr>
                <th class="table__cell">Nombre</th>
                <th class="table__cell">Descripcion</th>
                <th class="table__cell">Dia de la Semana</th>
                <th class="table__cell">Hora de Inicio</th>
                <th class="table__cell">Hora de Fin</th>
                <th class="table__cell">Cupo Máximo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($talleres as $taller)
                <tr>
                    <td class="table__cell">{{$taller->nombre}}</td>
                    <td class="table__cell">{{$taller->descripcion}}</td>
                    <td class="table__cell">{{$taller->dia_semana}}</td>
                    <td class="table__cell">{{$taller->hora_inicio}}</td>
                    <td class="table__cell">{{$taller->hora_fin}}</td>
                    <td class="table__cell">{{$taller->cupo_maximo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
