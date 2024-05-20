@extends('layouts.base')
@section('titulo', 'Formulario para crear ubicaciones')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/ubicaciones/{{$ubicacion}}/destroy" method="post">
    @csrf
    Debe confirmar la eliminación para continuar, dado que se borrarán también todos los talleres de esta ubicación:<BR>
    <input type="radio" name="confirmar" value='si'> Si, quiero borrar esta ubicación y los talleres.<BR>
    <input type="radio" name="confirmar" value='no' checked> No, no quiero borrar la ubicación.<BR>
    <input type="submit" value="Enviar">
    </form>
@endsection
