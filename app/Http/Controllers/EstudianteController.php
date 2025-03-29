<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $estudiantes = Estudiante::orderBy('nombre')->get();
            return view('estudiantes.index', compact('estudiantes'));
        }catch(\Exception $e){
            return back()->with('error', 'Error al cargar los estudiantes: '
             . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try{
            $carreras = Carrera::orderBy('nombre_carrera')->get();
            return view('estudiantes.create', compact('carreras'));
        }catch(\Exception $e){
            return back()->with('error', 'Error al cargar las carreras: '
             . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:estudiantes,email',
                'telefono' => 'required|string|max:15',
                'id_carrera' => 'required|exists:carreras,id'
            ]);

            Estudiante::create($request->all());
            return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente.');
        }catch(\Exception $e){
            return $e->getMessage();
            return back()->with('error', 'Error al crear el estudiante: '
             . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try{
            $estudiante = Estudiante::findOrFail($id);
            return view('estudiantes.show', compact('estudiante'));
        }catch(\Exception $e){
            return back()->with('error', 'Error al cargar el estudiante: '
             . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try{
            $estudiante = Estudiante::findOrFail($id);
            $carreras = Carrera::orderBy('nombre_carrera')->get();
            return view('estudiantes.edit', compact('estudiante', 'carreras'));
        }catch(\Exception $e){
            return back()->with('error', 'Error al cargar el estudiante: '
             . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:estudiantes,email,' . $id,
                'telefono' => 'required|string|max:15',
                'id_carrera' => 'required|exists:carreras,id'
            ]);

            $estudiante = Estudiante::findOrFail($id);
            $estudiante->update($request->all());
            return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente.');
        }catch(\Exception $e){
            return back()->with('error', 'Error al actualizar el estudiante: '
             . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            $estudiante = Estudiante::findOrFail($id);
            $estudiante->delete();
            return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente.');
        }catch(\Exception $e){
            return back()->with('error', 'Error al eliminar el estudiante: '
             . $e->getMessage());
        }
    }
}
