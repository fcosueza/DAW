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
    <form action="/ubicaciones/store" method="post">
    @csrf
    Nombre: <input type="text" name="nombre"><BR>
    Descripcion: <input type="text" name="descripcion"><BR>
    Días en los que está disponible:<BR>
    @foreach (['L','M','X','J','V','S','D'] as $dia)
        {{$dia}} <input type="checkbox" name='dias[]' value={{$dia}}>
    @endforeach
    <bR>
    <input type="submit" value="Crear nueva ubicación">
    </form>
@endsection
