<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Dotenv\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Painel\PedidoFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Painel\Cliente;
use App\Models\Painel\Pedido;
use App\Models\Painel\Product;

class PedidoController extends Controller
{
    private $pedido;
    private $totalpage = 20;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function ManyToOny() // teste de relacionameto
    {
        $tComentario = 'TESTE SYSTEM';
        $Pedido = Pedido::where('comentario', $tComentario)->get()->first();
        echo "<b>{$Pedido->comentario}</b>";

        $cliente = $Pedido->cliente;
        echo"<br>Cliente: {$cliente->nome}</br>";
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        //

        $title = 'Listagem Pedido';
        $pedidos = $this->pedido->paginate($this->totalpage);

        $clientes = Cliente::all()->pluck('nome','id');//recupera dados da tabela clientes
        $products = Product::all()->pluck('name','id','preco');//recupera dados da tabela clientes

        return view('site.painel.pedido.index-pedido', compact('pedidos', 'title','clientes', 'products'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($id = null)
    {
        //
        $title = 'Cadastro de Pedidos';
        $clientes= Cliente::all()->pluck('nome','id');//recupera dados da tabela clientes
        $products = Product::all()->pluck('name','id','preco');//recupera dados da tabela clientes

        return view('site.painel.pedido.create-pedido', compact('title', 'clientes','products'));

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(PedidoFormRequest $request)
    {
        //

        $dataForm = $request->all(); //pega todos os dados que vem do formulario
        $insert = $this->pedido->create($dataForm); //faz o cadastro no BD

        if ($insert){
           $pedido = $this->pedido->orderBy('id', 'desc')->first();
           return view('site.painel.pedido.show-pedido', compact('pedido'));
        }
         else{
            return redirect()->back('pedido.create-pedido');
         }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
        $pedido = $this->pedido->find($id);
        $products = Product::all()->pluck('name','id');

        $items = $pedido->items->all();

        $sub_total = array_pluck($items,'sub_total');

            $title = "Produto: {$pedido->id}";

        return view('site.painel.pedido.show-pedido', compact('pedido', 'title', 'products', 'items', 'preco'));
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
        $pedido = $this->pedido->find($id);
        $clientes= Cliente::all()->pluck('nome','id');//recupera dados da tabela clientes
        $products = Product::all()->pluck('name','id','preco');//recupera dados da tabela clientes
       // $clientes = Cliente::all()->pluck('nome','id');//recupera dados da tabela clientes
       // $products = Product::all()->pluck('name','id','preco');//recupera dados da tabela clientes

        $title = "Editar Produto: ($pedido->id)";

        return view('site.painel.pedido.create-pedido', compact('title', 'total_pedido', 'pedido','clientes', 'data_pedido','products'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(PedidoFormRequest $request, $id)
    {
        //
        $dataForm = $request->all();
        $pedido = $this->pedido->find($request->id);
        $update = $pedido->update($dataForm);

        if ($update) {
            return redirect()->route('pedido.index');
        } else {
            return redirect()->route('pedido.edit', $id)->with(['errors' => 'Falha ao Editar']);
        }
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
        $pedido = $this->pedido->find($id);

        $delete = $pedido->delete();

        if($delete)
            return redirect()->route('pedido.index');
        else
            return redirect()->route('pedido.show', $id)->with(['errors' => 'Falha ao Deletar']);
    }
}
