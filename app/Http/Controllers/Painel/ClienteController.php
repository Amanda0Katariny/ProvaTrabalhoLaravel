<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Painel\Cliente;
use App\Models\Painel\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\Painel\ClienteFormRequest;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class ClienteController extends Controller
{

    public function oneToMany()//testando realacionamentos
    {
        //$cliente = Cliente::where('nome', 'Amanda')->get()->first();
        $keySearch = 'a';
        $clientes = Cliente::where('nome', 'LIKE', "%{$keySearch}%")->with('pedidos')->get();//lista todos clientes que contem  letra 'a'

        //dd($clientes);

        foreach ($clientes as $cliente) {
            echo "<b>NOME= {$cliente->nome}</b>";

            //$pedidos = $cliente->pedidos;
            $pedidos = $cliente->pedidos()->get();

            foreach ($pedidos as $pedido) {
                echo "<br>ID= {$pedido->id}  // Total do Pedido= {$pedido->total_pedido} -- {$pedido->comentario}";
            }
            echo '<hr>';
        }
    }

    public function ManyToOny()
    {

        $tComentario = 'teste';
        $Pedido = Pedido::where('comentario', $tComentario)->get()->first();//mostra apenas 1 item
        echo "comentario do produto: <b> {$Pedido->id} - {$Pedido->total_pedido} - {$Pedido->comentario}</b>";

        $cliente = $Pedido->cliente;
        echo"<br>Cliente vinculado: {$cliente->nome}</br>";


        /* $comment = Pedido::find('2');
        echo $comment->Cliente->nome; */

       /*
        $keySearch = 'testando';
        $pedidos = Pedido::where('comentario', 'LIKE', "%{$keySearch}%")->get();//lista todos clientes que contem  letra 'a'
        //dd($clientes);
        foreach ($pedidos as $pedido) {
            echo "<b>Comentario: {$pedido->comentario}</b>";

            //$pedidos = $cliente->pedidos;
            $clientes = $pedido->clientes()->get();

            foreach ($clientes as $cliente) {
                echo "<br>Nome: {$cliente->nome} ";
            }
            echo '<hr>';
        }
        */
    }

    public function oneToManyTwo()//testando realacionamentos
    {

        $keySearch = 'a';
        $clientes = Cliente::where('nome', 'LIKE', "%{$keySearch}%")->with('pedidos')->get();//lista todos clientes que contem  letra 'a'

        //dd($clientes);

        foreach ($clientes as $cliente) {
            echo "<b>NOME= {$cliente->nome}</b>";

            $pedidos = $cliente->pedidos()->get();

            foreach ($pedidos as $pedido) {
                echo "<br>ID= {$pedido->id}  // Total do Pedido= {$pedido->total_pedido} -- {$pedido->comentario}";

                foreach ($pedido->items as $item){
                    echo " <i><b>SUB_TOTAL = {$cliente->nome} // {$item->sub_total}</b></i>";
                }
            }
            echo '<hr>';
        }
    }

    public function oneToManyTwoInsert()
    {
        $dataForm = [
            'comentario' => 'Testando',
            'total_pedido' => '5',
        ];

        $cliente = Cliente::find(7);
        $insertPedido = $cliente->Pedidos()->create($dataForm);
        var_dump($insertPedido->comentario);

    }


    public function oneToManyTwoInsertwo()
    {
        $dataForm = [
            'comentario' => 'Testando',
            'total_pedido' => '5',
            'cliente_id' => '7',
        ];

        $insertPedido = Pedido::create($dataForm);
        var_dump($insertPedido->comentario);

    }



    private $cliente;
    private $totalpage = 10;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $title = 'Lista de Clientes';
        $clientes = $this->cliente->paginate($this->totalpage);
       // $cliente->data_cadastro = Carbon::parse($cliente->data_cadastro)->format('d-m-Y');
        return view('site.painel.person.index_cliente', compact('title', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // $data_cadastro = Carbon::parse($cliente->data_cadastro)->format('d-m-Y');
        //if ($id) $cliente = $this->cliente->find($id)
        $title = 'Cadastro de Clientes';
       // $nome = $cliente->nome;
        return view('site.painel.person.create_cliente', compact('title','cliente'));
       // dd($request->$data_cadastro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {

        //
        $dataForm = $request->all();
        //dd($dataForm);

        $insert = $this->cliente->create($dataForm);
        //$cliente->data_cadastro = Carbon::parse($cliente->data_cadastro)->format('d-m-Y');

         if ($insert)
            return redirect()->route('cliente.index');
         else
            return redirect()->back('cliente.create_cliente');
    }

    public function agoravai(ClienteFormRequest $request)
    {
        dd(453);
        //

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

        $cliente = $this->cliente->find($id);
       //$cliente->data_cadastro = Carbon::parse($cliente->data_cadastro)->format('d-m-Y');

        $title = "Cliente: {$cliente->nome}";

        return view('site.painel.person.show', compact('cliente', 'title'));
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
        $cliente = $this->cliente->find($id);

        $title = "Editar Cliente: ($cliente->nome)";
        $nome = "{$cliente->nome}";
        $cnpj = "{$cliente->CNPJ}";
        $data_cadastro ="($cliente->data_cadastro)";
        //$cliente->data_cadastro = Carbon::parse($cliente->data_cadastro)->format('d-m-Y');
        return view('site.painel.person.create_cliente', compact('cliente', 'title', 'nome', 'data_cadastro', 'cnpj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        //
        $dataForm = $request->all();
        $cliente = $this->cliente->find($id);
        $update = $cliente->update($dataForm);

        if ($update) {
            return redirect()->route('cliente.index');
        } else {
            return redirect()->route('cliente.edit', $id)->with(['errors' => 'Falha ao Editar']);
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
        $cliente = $this->cliente->find($id);
        $delete = $cliente->delete();

        //$this->cliente->find($id)->delete();
        //return redirect('pedido');

        if ($delete) {
            return redirect()->route('cliente.index');
        } else {
            return redirect()->route('cliente.show', $id)->with(['errors' => 'Falha ao Deletar']);
        }

    }
}
