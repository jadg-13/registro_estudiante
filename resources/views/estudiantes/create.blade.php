@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Estudiante</h1>
    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>
        <div class="form-group">
            <label for="id_carrera">Carrera:</label>
            <select name="id_carrera" id="id_carrera" class="form-control" required>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->nombre_carrera }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection