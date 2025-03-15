@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Carreras</h1>
        <a href="{{ route('carreras.create') }}" class="btn btn-outline-primary">Crear Carrera</a>
        <a href="{{route('carreras.sendemail')}}" class="btn btn-outline-info"
        > Enviar Reporte</a>
    </div>

    <div class="container mt-2">
        {{-- Mostrar en una tabla los registros --}}
        <table class="table  table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $carrera)
                    <tr>
                        <td>{{ $carrera->codigo_carrera }}</td>
                        <td>{{ $carrera->nombre_carrera }}</td>
                        <td>
                            <a href="{{ route('carreras.edit', ['carrera' => $carrera->id]) }}" 
                                class="btn btn-outline-secondary">Editar</a>
                            <form action="{{ route('carreras.destroy', 
                            ['carrera' => $carrera->id]) }}"
                                method="POST" class="d-inline" 
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta carrera?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
