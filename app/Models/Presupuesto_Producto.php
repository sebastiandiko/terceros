<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto_Producto extends Model
{
    use HasFactory;
    protected $table = 'presupuesto_producto';

    // Puedes especificar los nombres de las columnas de la tabla intermedia si son diferentes de los convencionales
    protected $primaryKey = 'id'; // Nombre de la clave primaria
    protected $fillable = ['idPresupuesto', 'idProducto', 'cotizacion', 'cantidad', 'estado'];
    
    // Puedes desactivar los timestamps si no necesitas created_at y updated_at
    public $timestamps = false;
}
