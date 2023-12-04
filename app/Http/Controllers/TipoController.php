<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TipoController extends Controller
{
    public function type(){
        $user= null;
        $user = Auth::user();
        $tipoUser = $user->tipo;
        if($tipoUser == 0){
            return view('dashboard');
        }else{
            return view('dashboardGerente');
        }
    
}

}