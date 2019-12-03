<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Pedido;

class Item extends Model
{
    //

    protected $fillable = [
        'product_id',
        'pedido_id',
        'quantidade',
        'valor_unit',
        'sub_total'

    ];

    public function calculo ($dataform)
    {

        $product_id = array_get($dataform,'product_id');
        $quantidade = array_get($dataform,'quantidade');
        $product = Product::find($product_id);
        $sub_total = $product->preco * $quantidade;
        $dataform = array_add($dataform, 'sub_total', $sub_total);
        return $dataform;

    }
    public function Pedido()
    {
        return $this->belongsTo(Pedido::class); //Muitos Itens para Um Pedido

        //return $this->belongsTo(Pedido::class, 'items_id', 'sub_total');

        //return $this->belongsTo('App\Models\Painel\Cliente'); // livro laravel
        //return $this->belongsTo(User::class, 'user_id');
        // o belongsTo usado acima informa que cada item pertence a um pedido
    }

    public function Product()
    {
        return $this->belongsTo(Product::class); //Muitos itens para Um Produto
    }
}
