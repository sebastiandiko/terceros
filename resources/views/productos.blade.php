<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <title>Document</title>
</head>
@php
    $idPresupuesto = session('presupuesto');
@endphp
<header class="menu-arriba">
    <div>
        <img class="logo" src="https://netsco.jufecsa.com.ar/app/img/Jufec_Logo.png" alt="">
    </div>
    <nav>
      <ul class="menu-header">
        <li class="lista"><a class="opcion" href="{{ route('historial') }}">Historial</a></li>
        <li class="lista"><a class="opcion" href="{{ route('dashboard') }}">Menu</a></li>
      </ul>
</header>

<body class="product-body">

    <div class="content-table">    
        <table class="table-product" id="productos" style="width:100%;">
            <thead>
                <tr>
                    <th>Código de barra</th>
                    <th>Descripción</th>
                    <th>Stock disponible</th>
                    <th>Cantidad</th>
                </tr> 
            </thead> 
            <tbody>
                @foreach ($products as $pre_pro)
                    <tr>
                        <td>{{ $pre_pro -> idProducto }}</td>
                        <td>{{ $pre_pro -> descripcion }}</td>
                        <td>{{ $pre_pro -> stock }}</td>
                        <td><a href={{route ('cotizacion', ['idProducto' => $pre_pro['idProducto'], 'idPresupuesto' => $idPresupuesto]) }} class="btn btn-info">Cotizar</a></td>
                    @endforeach
            </tbody>
        </table>
    </div>
</html>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
