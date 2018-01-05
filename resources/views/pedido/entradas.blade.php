<ol class="entradas" id="entradasCarta">
    @foreach($entradas as $entrada)
        <li class="carta__pedido"><label>{{ $entrada->nombre }}</label><input type="number" name="{{$entrada->id}}"></li>
    @endforeach
</ol>