<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Pedido;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'preco'
    ];
// protected $guarded = ['admin'];
public function Items()
{
    return $this->belongsToMany()(Item::class);  //Muitos para Muitos
}

}
