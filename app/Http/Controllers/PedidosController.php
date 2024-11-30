<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $datos['pedidos'] = Pedidos::paginate(4);
        return view('pedidos.index', $datos);
    }

    public function destroy(string $id)
    {
        Pedidos::where('id', '=', $id)->delete();
        return redirect('pedidos');
    }
}