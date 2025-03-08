@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Editar Carrera</h1>
            <a href="{{ route('carreras.index') }}" 
            class="btn btn-outline-primary">
            Volver a Carreras</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('carreras.update', 
            ['carrera' => $carrera->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="codigo_carrera">Código de Carrera</label>
                    <input type="text" class="form-control" 
                    name="codigo_carrera" 
                    id="codigo_carrera" placeholder="Código de Carrera"
                    value="{{ $carrera->codigo_carrera }}">
                </div>
                <div class="form-group mt-2">
                    <label for="nombre_carrera">Nombre de Carrera</label>
                    <input type="text" class="form-control" 
                    name="nombre_carrera" 
                    id="nombre_carrera" placeholder="Introduce el nombre de la carrera"
                    value="{{ $carrera->nombre_carrera }}">
                </div>
                <div class="form-group mt-2">
                    <label for="descripcion_carrera">Descripción de Carrera</label>
                    <textarea class="form-control" name="descripcion_carrera" 
                    id="descripcion_carrera" 
                    rows="3">{{ $carrera->descripcion_carrera }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar Carrera</button>
            </form>
        </div>
    </div>

</div>

@endsection