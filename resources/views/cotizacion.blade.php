<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<form action='/edit' method="POST" class="mi-formulario">
    @csrf
    <input type="hidden" value="{{ $pr['id'] }}" name="id">
    <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" class="form-control" placeholder="Ingrese cantidad" required>
    </div>
    <div class="form-group">
        <label for="cotizacion">Cotización:</label>
        <input type="number" name="cotizacion" class="form-control" placeholder="Ingrese Cotización" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
