<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styleMenu.css') }}">
    <title>Document</title>
</head>

<header class="menu-arriba">
    <div>
        <img class="logo" src="https://netsco.jufecsa.com.ar/app/img/Jufec_Logo.png" alt="">
    </div>
    <nav>
      <ul class="menu-header">
        <li class="lista"><a class="opcion" href="{{ route('presupuesto') }}">Atrás</a></li>
      </ul>
    </nav>
</header>

<body class="body-vendedores">
    <div class="menu-cotizacion">
        <form action='/update' method="POST">
            @csrf
            <div class="titulo-cotizacion">Datos Cotización</div>
            <input type="hidden" name="id" value="{{ $pr }}">
            <div class="form-div">
                <input type="number" name="cantidad" class="form-ctrl" placeholder="Cantidad" required>
            </div>
            <div class="form-div">
                <input type="number" name="cotizacion" class="form-ctrl" placeholder="Cotización" required>
            </div>
            <button type="submit" class="btn-cotizar">Guardar</button>
        </form>
    </div>
</body>
</html>