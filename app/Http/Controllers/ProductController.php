<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers;
use App\Models\Producto;
use App\Models\Laboratorio;
use App\Models\Presupuesto;
use Illuminate\Validation\Rule;
use Illuminate\Support\ViewErrorBag;

class ProductController extends Controller
{
    function createPresupuesto(Request $req)
    {
        $presupuesto = new Presupuesto;
        $presupuesto->fecha = Carbon::now();
        $presupuesto->numCliente = $req->input('numCliente');
        $presupuesto->nombreVendedor = $req->input('nombreVendedor');
        $presupuesto->save();
        return redirect('productos')->with('presupuesto', $presupuesto);
    }

public function obtenerProductos(){
        $products = Producto::all();
        return view('productos')->with('products', $products);
    }

public function showEdit($id){
        $products=Producto::find($id);
        return view('cotizacion', ['pr'=>$products]);
    }

public function update(Request $req){
        $product=Producto::find($req->id);
        $product->cantidad=$req->cantidad;
        $product->cotizacion=$req->cotizacion;
        $product->save();
        return redirect('productos'); 
    }

public function obtenerPresupuestos(){
    $presupuestos = Presupuesto::all();
    return view('presupuestosVendedor', ['presupuestos' => $presupuestos]);
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
