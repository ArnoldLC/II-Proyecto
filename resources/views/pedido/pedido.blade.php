@extends('layouts.app')

@section('board-container')

    @php
        $dia = Carbon\Carbon::now('America/Bogota')->dayOfWeek;

        switch ($dia) {
            case 0:
                $diaS = 'Domingo';
                break;
            case 1:
                $diaS = 'Lunes';
                break;
            case 2:
                $diaS = 'Martes';
                break;
            case 3:
                $diaS = 'Miercoles';
                break;
            case 4:
                $diaS = 'Jueves';
                break;
            case 5:
                $diaS = 'Viernes';
                break;
            case 6:
                $diaS = 'Sábado';
                break;
        }

    @endphp

    <h3 class="pedido__dia">{{ $diaS }} {{ Carbon\Carbon::now('America/Bogota')->toDateString() }}</h3>
    <form class="carta" method="post" action="{{route('pedido.store')}}">
        {{ csrf_field() }}
        <div class="carta__opciones">
            <ul class="carta__container">
                <li class="carta__opcion" id="entradas">Entradas</li>
                <li class="carta__opcion" id="segundos">Segundos</li>
                <li class="carta__opcion" id="postres">Postres</li>
                <li class="carta__opcion" id="bebidas">Bebidas</li>
            </ul>
            <div class="actores">
                <div class="mesa">
                    <label for="mesa">Mesa</label>
                    <select name="mesa" id="">
                        @for($i = 1; $i < 13; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="mozo">
                    <label for="mozo">Mozo</label>
                    <select name="mozo" id="">
                        @foreach($mozos as $mozo)
                            <option value="{{ $mozo->id }}">{{ $mozo->nombres ." ". $mozo->apellidos }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="cliente">
                    <label for="cliente">Cliente</label>
                    <input type="text" name="cliente">
                </div>
            </div>
        </div>
        <div class="carta__pedidos">
            @include('pedido.entradas')
            @include('pedido.segundos')
            @include('pedido.postres')
            @include('pedido.bebidas')
        </div>
        <button type="submit" class="btn__succ">Guardar</button>
    </form>
@endsection