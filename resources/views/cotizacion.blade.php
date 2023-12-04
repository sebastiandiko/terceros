<form action='/edit' method="POST">
    @csrf
    <input type="hidden" value="{{ $pr['id'] }}" name=id>
    <input type="number" name="cantidad" class="input-n" placeholder="Ingrese cantidad">
    <input type="number" name="cotizacion" class="input-n" placeholder="Ingrese Cotización">
    <button type="subtmit">Guardar</button>
</form> 