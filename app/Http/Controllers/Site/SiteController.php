<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SiteController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');

        /*  $this->middleware('auth')
        ->only([
        'contato',
        'categoria'
        ]);
         */

        /* $this->middleware('auth')
    ->except([
    'index',
    'contato'
    ]);
     */
    }

    public function index()
    {
        /* $title = 'Home'; //home criada antes do adminLTE
        $xss = '<script>alert("Ataque XSS"); </script>';
        $var1 = '123';
        $arrayData = [];
        return view('site.home.index',compact ('title','xss', 'var1', 'arrayData'));
         */
        return view('site.home.index');
    }

    public function contato()
    {
        return view('site.painel.contact.index');
    }

    public function categoria($id)
    {
        return "Listagem dos Posts da Categoria: {$id}"; // falta fazer a view
    }

    public function categoriaOp($id = 25)
    {
        return "Listagem dos posts da categoria: {$id}"; //falta fazer a view
    }
}
