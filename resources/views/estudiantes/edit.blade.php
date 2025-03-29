@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estudiante</h1>
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $estudiante->apellido) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $estudiante->email) }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $estudiante->telefono) }}">
        </div>

        <div class="form-group">
            <label for="id_carrera">Carrera:</label>
            <select name="id_carrera" id="id_carrera" class="form-control" required>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $estudiante->id_carrera == $carrera->id ? 'selected' : '' }}>{{ $carrera->nombre_carrera }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection