<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto_Producto extends Model
{
    use HasFactory;
    protected $table = 'presupuesto_producto';

    protected $primaryKey = 'id'; 

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'idPresupuesto');
    }
    protected $fillable = ['cotizacion', 'cantidad', 'estado'];
    
    // Puedes desactivar los timestamps si no necesitas created_at y updated_at
    public $timestamps = false;
}
