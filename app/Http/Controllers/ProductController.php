<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Producto;
use App\Models\Laboratorio;
use Illuminate\Validation\Rule;
use Illuminate\Support\ViewErrorBag;

class ProductController extends Controller
{
    function update(Request $req)
    {
        $product=Producto::find($req->id);
        $product->cantidad=$req->cantidad;
        $product->cotizacion=$req->cotizacion;
        $product->estado=0;
        $product->save();
        return redirect('dashboard/presupuesto');
    }


    public function showEdit($id){
        $products=Producto::find($id);
        return view('cotizacion', ['pr'=>$products]);
    }
    
    public function obtenerProductos(){
        $laboratorios = Laboratorio::all();
        $products = Producto::all();
        return view('presupuesto', compact('products', 'laboratorios'));
    }

    public function getProductosPorLaboratorio($idLaboratorio)
    {
        $productos = Producto::where('IDlaboratorio', $idLaboratorio)->get();

        return response()->json($productos);
    }

    public function obtenerProductoSGerente(){
        $products = Producto::all();
        return view('presupuestoGerente')->with('products', $products);
    }

    public function obtenerHistorial(){
        $products = Producto::whereNotNull('cantidad')
                         ->whereNotNull('cotizacion')
                         ->get();

        return view('historial')->with('products', $products);
    }

    public function aprobar($id)
    {
        $product = Producto::find($id);
        $product->estado = 1;
        $product->save();

        return redirect()->route('presupuestoGerente');
    }

    public function desaprobar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 2; // 0 para estado desaprobado
        $producto->save();

        return redirect()->route('presupuestoGerente');
    }
} 
