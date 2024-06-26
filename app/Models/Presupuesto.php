<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPresupuesto'; 

    protected $fillable = [
        'fecha',
        'numCliente',
        'nombreVendedor'
    ];
}