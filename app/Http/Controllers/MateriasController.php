<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index()
    {
        $materias = Materias::paginate(4);

        $ctdb = Categorias::all();

        return view('materias.index', compact("materias", "ctdb"));
    }

    public function create()
    {
        $materias = Materias::all();

        $ctdb = Categorias::all();

        return view('materias.create', compact("materias", "ctdb"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
            'costo' => 'required|numeric',
            'categoria' => 'required|string|max:255',
        ]);

        $datosMateria = request()->except('_token');
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosMateria['foto'] = $nombreImagen;
        }

        Materias::insert($datosMateria);
        return redirect()->route('materias.index')->with('success', 'Materia prima registrada con éxito.');
    }

    public function edit(string $id)
    {
        $materia = Materias::findOrFail($id);
        $ctdb = Categorias::all();
        return view('materias.edit', compact('materia', "ctdb"));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
            'costo' => 'required|numeric',
            'categoria' => 'required|string|max:255',
        ]);

        $datosMateria = request()->except(['_token', '_method']);
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosMateria['foto'] = $nombreImagen;
        }

        Materias::where('id','=',$id)->update($datosMateria);
        $materia = Materias::findOrFail($id);
        return redirect()->route('materias.index')->with('success', 'Materia prima actualizada con éxito.');
    }

    public function destroy(string $id)
    {
        Materias::where('id','=',$id)->delete();
        return redirect('materias');
    }
}