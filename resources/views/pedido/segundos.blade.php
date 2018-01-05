<ol class="segundos ocultar" id="segundosCarta">
    @foreach($segundos as $segundo)
        <li class="carta__pedido"><label>{{ $segundo->nombre }}</label><input type="number" name="{{$segundo->id}}"></li>
    @endforeach
</ol>