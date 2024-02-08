<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/styleMenu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>Menú vendedores</title>
</head>

<header class="menu-arriba">
    <div>
        <img class="logo" src="https://netsco.jufecsa.com.ar/app/img/Jufec_Logo.png" alt="">
    </div>
</header>

<body class="body-vendedores">
  <div class="menu">
    <a class="custom-button" href="{{ route('presupuesto') }}"> Presupuesto <i class="bi bi-calendar-check"></i></a>
    <a class="custom-button" href="{{ route('historial') }}"> Historial <i class="bi bi-pencil-square"></i></a>
    <a class="custom-button" href="{{ route('dashboard') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"> Salir <i class="bi bi-house-x"></i></a>
  </div>
</body>
</html>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
</div>
</li>