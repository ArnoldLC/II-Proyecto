<ol class="bebidas ocultar" id="bebidasCarta">
    @foreach($bebidas as $bebida)
        <li class="carta__pedido"><label>{{ $bebida->nombre }}</label><input type="number" name="{{$bebida->id}}"></li>
    @endforeach
</ol>