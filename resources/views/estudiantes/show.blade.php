@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Estudiante</h1>
    <div class="card">
        <div class="card-header">
            Información del Estudiante
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
            <p><strong>Apellido:</strong> {{ $estudiante->apellido }}</p>
            <p><strong>Email:</strong> {{ $estudiante->email }}</p>
            <p><strong>Teléfono:</strong> {{ $estudiante->telefono }}</p>
            <p><strong>Carrera:</strong> {{ $estudiante->carrera->nombre_carrera }}</p>
        </div>
    </div>
    <a href="{{ route('estudiantes.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
</div>
@endsection