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
    <form action="/ubicaciones/{{$ubicacion->id}}/update" method="post">
    @csrf
    Nombre: <input type="text" name="nombre" value="{{old('nombre',$ubicacion->nombre)}}"><BR>
    Descripcion: <input type="text" name="descripcion" value="{{old('descripcion',$ubicacion->descripcion)}}"><BR>
    Días en los que está disponible:<BR>
    @foreach (['L','M','X','J','V','S','D'] as $dia)
        {{$dia}} <input type="checkbox" name='dias[]'
                  value="{{$dia}}" @checked(in_array($dia,old('dias',explode(',',$ubicacion->dias))))>
    @endforeach
    <bR>
    <input type="submit" value="Modificar ubicación">
    </form>
@endsection
