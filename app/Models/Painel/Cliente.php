<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Pedido;

class Cliente extends Model
{
    //private $table = 'cliente';
    //public $timestamps = false;
    protected $dates = ['data_cadastro'];
    protected $fillable = [
        'nome',
        'data_cadastro',
        'CNPJ'
    ];

    public function Pedidos()//retorna todos os pedidos vinculados ao cliente (1 cliente pode ter varios pedidos)
    {
        return $this->hasMany(Pedido::Class);//relacionameto de 1 p/ muitos
    }


}
