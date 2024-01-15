<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers;
use App\Models\Producto;
use App\Models\Laboratorio;
use App\Models\Presupuesto;
use App\Models\Presupuesto_Producto;
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
        return redirect('productos')->with('presupuesto', $presupuesto->idPresupuesto);
    }

public function obtenerProductos(){
        $productos = Producto::all();
        return view('productos')->with([
            'products' => $productos,
    ]);
}
public function showEdit($idProducto, $idPresupuesto){
        return view('cotizacion', compact('idProducto', 'idPresupuesto'));
    }

public function update(Request $req){
        $pre_pro = new Presupuesto_Producto;
        $pre_pro->idProducto = $req->idProducto;
        $pre_pro->idPresupuesto = $req->idPresupuesto;
        $pre_pro->cantidad = $req->cantidad;
        $pre_pro->cotizacion = $req->cotizacion;
        $pre_pro->save();
        return redirect('productos')->with('presupuesto', $pre_pro->idPresupuesto);
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

public function obtenerPresupuestoGerente(){
    $presupuesto = Presupuesto::get();
    return view('presupuestoGerente')->with('presupuesto', $presupuesto);
    }

public function obtenerHistorial(){
    $presupuesto = Presupuesto::get();
    return view('historial')->with('presupuesto', $presupuesto);
    }

public function obtenerHistorialProductos($idPresupuesto){
    $products = Presupuesto_Producto::with('producto')->get();
    return view('historialProductos', compact('products', 'idPresupuesto'));
}

public function aprobar($id)
    {
        $presupuesto = Presupuesto::find($id);
        $presupuesto->estado = 1;
        $presupuesto->save();
        return redirect()->route('presupuestoGerente'); 
    }

public function desaprobar($id)
    {
        $presupuesto = Presupuesto::find($id);
        $presupuesto->estado = 2;
        $presupuesto->save();
        return redirect()->route('presupuestoGerente'); 
    }
} 
