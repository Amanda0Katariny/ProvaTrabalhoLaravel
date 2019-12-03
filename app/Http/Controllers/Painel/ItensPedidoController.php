<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Pedido;
use App\Models\Painel\Product;

class ItensPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $Item;
    private $totalpage = 10;

    function __construct(Item $item)
    {
        $this->Item = $item;
    }


    public function index($id)
    {
        //
        dd(5);
        $title = 'Listagem Produtos';

        $item = $this->items->paginate($this->totalpage);

        return view('site.painel.item.create-item', compact('item'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $title = 'Adicionar Produtos';
        return view('site.painel.products.create-edit', compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dataForm = $request->all(); //pega todos os dados que vem do formulario
        $insert = $this->item->create($dataForm); //faz o cadastro no BD

        if ($insert)
        return redirect()->route('pedido.show');
        else
        return redirect()->back('item.create-item');
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
        $item = $this->item->find($id);

        return view('site.painel.products.show', compact('item'));
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
        $item = $this->item->find($id);

        //$categorys = ['Eletronicos', 'Moveis', 'Limpeza', 'Banho', 'Chato'];
        //$preco = ($product->preco);

        return view('site.painel.products.create-edit', compact('item'));

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
         //recupera o item para editar
         $item = $this->item->find($id);

         //verifica se o produto esta ativo
         //$dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

         //altera os itens
         $update = $item->update($dataForm);

         //verifica se realmente editou
         if($update)
         return redirect()->route('pedido.show');
         else
         return redirect()->route('pedido.edit',$id)->with(['errors'=>'Falha ao Editar']);
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
        $item = $this->item->find($id);

        $delete = $item->delete();

        if($delete)
        return redirect()->route('pedido.index');
        else
        return redirect()->route('pedido.show', $id)->with(['errors' => 'Falha ao Deletar']);
    }
}
