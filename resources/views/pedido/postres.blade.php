<ol class="postres ocultar" id="postresCarta">
    @foreach($postres as $postre)
        <li class="carta__pedido"><label>{{ $postre->nombre }}</label><input type="number" name="{{$postre->id}}"></li>
    @endforeach
</ol>