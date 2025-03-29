@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">Agregar Estudiante</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->apellido }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td> {{ $estudiante->carrera->nombre_carrera}} </td>
                <td>{{ $estudiante->email }}</td>
                <td>
                    <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection