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

<header class="menu-arriba">
    <div>
        <img class="logo" src="https://netsco.jufecsa.com.ar/app/img/Jufec_Logo.png" alt="">
    </div>
    <nav>
      <ul class="menu-header">
        <li class="lista"><a class="opcion" href="{{ route('dashboard') }}">Menu</a></li>
      </ul>
    </nav>
</header>

<body class="product-body">
    <div class="content-table">    
        <table class="table-product" id="productos" style="width:100%;">
            <thead>
                <tr>
                    <th>N° presupuesto</th>
                    <th>Vendedor</th>
                    <th>N° cliente</th>
                    <th>Fecha</th>
                    <th>Detalle</th>
                    <th>Estado</th>
                </tr> 
            </thead>
            <tbody>
                @foreach ($presupuesto as $pre)
                    <tr>
                        <td>{{ $pre -> idPresupuesto }}</td>
                        <td>{{ $pre -> nombreVendedor }}</td>
                        <td>{{ $pre -> numCliente }}</td>
                        <td>{{ $pre -> fecha }}</td>
                        <td><a href={{ route('historialProductos', [ $pre['idPresupuesto'] ] )}} class="btn btn-info">Detalle</a></td>
                        <td>{{ $pre->estado === 0 ? 'Pendiente' : ($pre->estado == 1 ? 'Aprobado' : 'Desaprobado') }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div> 
</html>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

