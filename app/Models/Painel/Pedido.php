<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //

    protected $dates = ['data_pedido'];
    protected $fillable = [
        'cliente_id',
        'data_pedido',
        'total_pedido',
        'comentario'
    ];

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id'); //Muitos pedidos para Um Cliente (muitos para um)

        //return $this->belongsTo('App\Models\Painel\Cliente'); // livro laravel
        //return $this->belongsTo(User::class, 'user_id');
        // o belongsTo usado acima informa que cada pedido pertence a um cliente
    }
    public function Items()
    {
        return $this->hasmany(Item::class); //Pedido tem 1 item  (one-to-many - 1 para Muitos)
    }

}
