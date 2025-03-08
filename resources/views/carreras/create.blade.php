@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Carrera</h1>
        <a href="{{ route('carreras.index') }}" 
        class="btn btn-outline-primary">Volver a Carreras</a>
    </div>

    <div class="container">
        <form action = "{{ route('carreras.store') }}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="codigo_carrera">Código de Carrera</label>
                <input type="text" class="form-control" name="codigo_carrera" 
                id="codigo_carrera" placeholder="Código de Carrera">
            </div>

            <div class="form-group mt-2">
                <label for="nombre_carrera">Nombre de Carrera</label>
                <input type="text" class="form-control" name="nombre_carrera" 
                id="nombre_carrera" placeholder="Introduce el nombre de la carrera">
            </div>

            <div class="form-group mt-2">
                <label for="descripcion_carrera">Descripción de Carrera</label>
                <textarea class="form-control" name="descripcion_carrera"
                id="descripcion_carrera" rows="3"
                placeholder="Introduce la descripción de la carrera"></textarea>
            </div>

            <button type="submit" class="btn btn-outline-success col-md-3 col-12 mt-2">Guardar</button>
        </form>
    </div>

@endsection