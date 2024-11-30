<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $datos['categorias']=Categorias::paginate(4);
        return view('categorias.index',$datos);
    }

    public function create()
    {
        return view('categorias.create');
        return view('categorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        $datosCategoria = request()->except('_token');

        Categorias::insert($datosCategoria);
        return redirect()->route('categorias.index')->with('success', 'categoria registrado con éxito.');
    }

    public function edit(string $id)
    {
        $categoria = Categorias::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        $datosCategoria = request()->except(['_token', '_method']);

        Categorias::where('id','=',$id)->update($datosCategoria);
        $categoria = Categorias::findOrFail($id);
        return redirect()->route('categorias.index')->with('success', 'categoria actualizado con éxito.');
    }

    public function destroy(string $id)
    {
        Categorias::where('id','=',$id)->delete();
        return redirect('categorias');
    }
}