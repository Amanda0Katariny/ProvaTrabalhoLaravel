<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
    private $product;
    private $totalpage = 10;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        // {-- $product = new Product; --}

        $title = 'Listagem Produtos';

        $products = $this->product->paginate($this->totalpage);

        return view('site.painel.products.index', compact('products', 'title'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($id = null)
    {
        //$categorys = ['Eletronicos', 'Moveis', 'Limpeza', 'Banho', 'Chato'];
        //dd($categorys);
        //if ($id) $product = $this->product->find($id)
        $preco = '00.00';
        $title = 'Cadastro de Produtos';
        return view('site.painel.products.create-edit', compact('title', 'preco','product'));

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    *
    */
    public function store(ProductFormRequest $request)
    {

        $dataForm = $request->all(); //pega todos os dados que vem do formulario
        $insert = $this->product->create($dataForm); //faz o cadastro no BD

        if ($insert)
        return redirect()->route('produtos.index');
        else
        return redirect()->back('produtos.create-edit');


        //Formas de retornar dados do formulario
        //dd($request->all());
        //dd($request->only(['name','number']));
        //dd($request->except(['_token', 'category']));
        //dd($request->input('name'));



        /* if($dataForm['active'] == '')
        $dataForm['active'] = 0;
        else
        $dataForm['active'] = 1; **/

        // $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //validar os dados
        //  $this->validate($request, $this->product->rules);

        // $validate = Validator::make($dataForm, $this->product->rules;);
        /*
        $messages = [
            'name.required' => 'O campo nome é Obrigatorio',
            'number.numeric' => 'Apenas numeros',
            'number.required' => 'O campo numero é Obrigatorio',
            'category.required' => 'O campo Categoria é Obrigatorio',
        ];

        $validate = validator($dataForm, $this->product->rules, $messages);
        if ($validate->fails()) {
            return redirect()->route('produtos.create')
            ->withErrors($validate)
            ->withInput();
        }
        *
        */
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
        //return "vizualizar produto- Show {$id}";,

        $product = $this->product->find($id);

        $title = "Produto: {$product->name}";

        return view('site.painel.products.show', compact('product', 'title'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //recupera produto pelo id
        $product = $this->product->find($id);

        $title = "Editar Produto: ($product->name)";

        //$categorys = ['Eletronicos', 'Moveis', 'Limpeza', 'Banho', 'Chato'];
        $preco = ($product->preco);

        return view('site.painel.products.create-edit', compact('title', 'preco', 'product'));

    }

    public function update(ProductFormRequest $request, $id)
    {
        //update -> put ou path

        //recupera todos os dados do fomulario
        $dataForm = $request->all();

        //recupera o item para editar
        $product = $this->product->find($id);

        //verifica se o produto esta ativo
        //$dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //altera os itens
        $update = $product->update($dataForm);

        //verifica se realmente editou
        if($update)
        return redirect()->route('produtos.index');
        else
        return redirect()->route('produtos.edit',$id)->with(['errors'=>'Falha ao Editar']);
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
        $product = $this->product->find($id);

        $delete = $product->delete();

        if($delete)
        return redirect()->route('produtos.index');
        else
        return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao Deletar']);
    }

    public function tests()
    {
        /*
        $prod = $this->product;
        $prod->name = 'Nome do Produto';
        $prod->number = 12345654;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Description do Produto';
        $insert = $prod->save();

        if($insert)
        return 'Inserido com Sucesso';
        else
        return 'Falha ao inserir';
        **/

        /*
        $insert = $this->product->create([
            'name' => 'Produto 03 teste',
            'number' => 141,
            'active' => false,
            'category' => 'eletronicos',
            'description' => 'Descrição: Produto Teste',
            ]);

            if($insert)
            return "Inserido com Sucesso - Codigo Produto: {$insert->id}";
            else
            return 'Falha ao inserir';
            **/

            /*
            $prod = $this->product->find(10);
            $prod->name = 'Update';
            $prod->number = 02354;
            $prod->active = true;
            $prod->category = 'eletronicos';
            $prod->description = 'Desc Update';

            $update = $prod->save();

            if($update)
            return 'Alterado com Sucesso.';
            else
            return 'Falha ao alterar.';
            **/

            // -- dd($prod->description); ---debug

            /*
            $prod = $this->product->find(13);

            $update = $prod->update([

                'name'      => 'Update teste',
                'number'    => 0005,
                'active'    => true,

                ]);

                if($update)
                return 'Alterado com Sucesso.';
                else
                return 'Falha ao alterar.';
                *
                */

                /*
                $update = $this->product
                ->where('number', 12345654)
                ->update([

                    'name' => 'Update teste 5',
                    'number' => 1230045654,
                    'active' => false,
                    ]);

                    if ($update)
                    return 'Alterado com Sucesso. #2';
                    else
                    return 'Falha ao alterar. #2';
                    **/

                    /*
                    $prod = $this->product->find(2);
                    $delete = $prod->delete();

                    if ($delete)
                    return 'Deletado com Sucesso';
                    else
                    return 'falha ao deletar';
                    *
                    */

                    /*
                    $prod = $this->product->destroy([1]);
                    $delete = $prod->delete();

                    if ($delete)
                    return 'Deletado com Sucesso #2';
                    else
                    return 'falha ao deletar #2';
                    *
                    */

                    $delete = $this->product
                    ->where('number', 50001)
                    ->delete();

                    if ($delete) {
                        return 'Deletado com Sucesso #3';
                    } else {
                        return 'falha ao deletar #3';
                    }

                }
            }
