@extends('layouts.base')

@section('titulo', 'Creacion de Ubicacion')

@section('content')


    <form class="form flex center" action="/ubicaciones/store" method="POST">
        @csrf

        <div class="form__header">
            <h3>Nueva Ubicación</h3>
        </div>

        <div class="form__control flex">
            <label for="nombre">Nombre:</label>
            <input class="form__input" type="text" name="nombre" id="nombre">
        </div>
        <div class="form__control flex">
            <label for="descripcion">Descripcion:</label>
            <input class="form__input"type="text" name="descripcion" id="descripcion">
        </div>

        <div class="form__control">
            <label>Dias en los que está disponible: </label><br>
            @foreach(['L', 'M', 'X', 'J', 'V', 'S', 'D'] as $dia)
                {{$dia}} <input class="form__check" type="checkbox" name="dias[]" value="{{$dia}}">
            @endforeach
        </div>

        <br>

        <button class="form__button" type="submit">Crear Ubicacion</button>
    </form>

    @if ($errors->any())
        <div class="error__container">
            <h2 class="error__title">Errores: </h2>
            <ul class="error__list">
                @foreach($errors->all() as $error)
                    <li class="error__msg">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection


