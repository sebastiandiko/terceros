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

//Este controlador contiene las funciones necesarias para el funcionamiento del sw una vez que el usuario se loguea
class ProductController extends Controller
{

//Se crea un nuevo objeto de tipo Presupuesto para almacenar los datos que se obtienen mediante el ingreso del usuario
//(nombre de vendedor y numero de cliente) y luego envía el id de ese presupuesto a la vista de cotización
function createPresupuesto(Request $req)
    {
        $presupuesto = new Presupuesto;
        $presupuesto->fecha = Carbon::now();
        $presupuesto->numCliente = $req->input('numCliente');
        $presupuesto->nombreVendedor = $req->input('nombreVendedor');
        $presupuesto->save();
        return redirect('productos')->with('presupuesto', $presupuesto->idPresupuesto);
    }

//se realiza  una consulta para obtener todos los productos y enviar esos datos a la vista "productos" y así poder mostrarlos
public function obtenerProductos(){
        $productos = Producto::all();
        return view('productos')->with([
            'products' => $productos,
    ]);
}

//Recibe por parámetro ambos IDs y los manda a la vista cotización
public function showEdit($idProducto, $idPresupuesto){
        return view('cotizacion', compact('idProducto', 'idPresupuesto'));
    }

//se crea un objeto Presupuesto_Producto para almacenar y relacionar el producto cotizado con el presupuesto que se está armando
public function update(Request $req){
        $pre_pro = new Presupuesto_Producto;
        $pre_pro->idProducto = $req->idProducto;
        $pre_pro->idPresupuesto = $req->idPresupuesto;
        $pre_pro->cantidad = $req->cantidad;
        $pre_pro->cotizacion = $req->cotizacion;
        $pre_pro->save();
        session()->put($pre_pro->idPresupuesto, $pre_pro->idProducto);
        return redirect('productos')->with('presupuesto', $pre_pro->idPresupuesto);
    }

//Realiza una consulta para obtener la informacón de todos los presupuestos y lo envía a la vista presupuestosVendedor
public function obtenerPresupuestos(){
    $presupuestos = Presupuesto::all();
    return view('presupuestosVendedor', ['presupuestos' => $presupuestos]);
    }


public function getProductosPorLaboratorio($idLaboratorio){
        $productos = Producto::where('IDlaboratorio', $idLaboratorio)->get();
        return response()->json($productos);
}

//Realiza una consulta para obtener la informacón de todos los presupuestos y lo envía a la vista presupuestoGerente
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