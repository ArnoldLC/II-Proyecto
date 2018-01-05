<?php

namespace App\Http\Controllers;

use App\Boleta;
use App\Cliente;
use App\DetallePedido;
use App\Empleado;
use App\Pedido;
use App\PlatilloCarta;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('layouts.app');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entradas = PlatilloCarta::where('tipo', 'entrada')
            ->orderBy('precio')
            ->get();
        $segundos = PlatilloCarta::where('tipo', 'segundo')
            ->orderBy('precio')
            ->get();
        $bebidas = PlatilloCarta::where('tipo', 'bebida')
            ->orderBy('precio')
            ->get();
        $postres = PlatilloCarta::where('tipo', 'postre')
            ->orderBy('precio')
            ->get();
        $mozos = Empleado::where('tipo', 1)
            ->get();
        //dd($entradas, $segundos);

        return view('pedido.pedido',
            [
                'entradas'=> $entradas,
                'segundos'=> $segundos,
                'bebidas' => $bebidas,
                'postres' => $postres,
                'mozos' => $mozos
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $cliente = Cliente::where('nombres', $request->cliente)->get();

        if ($cliente->isEmpty()) {
            $cliente = Cliente::create([
                'nombres' => $request->cliente
            ]);
        } else {
            $cliente = $cliente[0];
        }

        //dd($cliente);
        $pedido = Pedido::create([
            'id_cliente' => $cliente->id,
            'id_mozo' => $request->mozo,
            'mesa' => $request->mesa,
            'fecha_pedido' => Carbon::now('America/Bogota')
        ]);

        $lenReq = count($request->toArray());
        $precioTotal = 0;

        for ($i = 1; $i <= $lenReq - 4; $i++) {
            if ($request->get($i) != null) {
                $detPedido = DetallePedido::create([
                    'id_pedido' => $pedido->id,
                    'id_platillo' => $i,
                    'cantidad' => $request->get($i)
                ]);
                $platillo = PlatilloCarta::where('id', $i)->get();
                $platillo = $platillo->toArray();
                $precioTotal += ($platillo[0]['precio']) * $detPedido->cantidad;
                $detPedido->save();
            }
        }

        $boleta = Boleta::create([
           'id_pedido' => $pedido->id,
            'costo_total' => $precioTotal
        ]);

        $cliente->save();
        $pedido->save();
        $boleta->save();

        return redirect('/pedido/'.$pedido->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::where('id', $id)->get();
        $platillos = DetallePedido::where('id_pedido', $id)->get();
        dd($pedido, $platillos);
        return view('ticket.pedidolisto');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
