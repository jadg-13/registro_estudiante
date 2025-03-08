<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarreraController extends Controller
{
    //
    public function index(){
        //Obtener todas las carreras ordenadas alfabéticamente por nombre_carrera
        $carreras = Carrera::orderBy('nombre_carrera')->get();

        return view('carreras.index', compact('carreras'));
    }

    public function create(){
        return view('carreras.create');
    }

    public function store(Request $request){
        //validar datos del formulario
        $request->validate([
            'nombre_carrera' => 'required',
            'codigo_carrera' => 'required',
            'descripcion_carrera' => 'required'
        ]);

        //crear un nuevo registro en la tabla carreras
        Carrera::create($request->all());

        //redireccionar a la vista principal
        return redirect()->route('carreras.index');
        
    }

    public function edit(Carrera $carrera){
        return view('carreras.edit', compact('carrera'));
    }

    public function update(Request $request, Carrera $carrera){
        //validar datos del formulario
        $request->validate([
            'nombre_carrera' => 'required',
            'codigo_carrera' => 'required',
            'descripcion_carrera' => 'required'
        ]);

        //actualizar el registro en la tabla carreras
        $carrera->update($request->all());

        //redireccionar a la vista principal
        return redirect()->route('carreras.index');
    }

    public function destroy(Carrera $carrera){
        //eliminar el registro en la tabla carreras
        $carrera->delete();

        //redireccionar a la vista principal
        return redirect()->route('carreras.index');
    }
}
