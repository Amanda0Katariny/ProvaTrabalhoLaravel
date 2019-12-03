<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$this->get('one-to-many', 'Painel\ClienteController@oneToMany');//teste de relecionamentos
$this->get('many-to-one', 'Painel\ClienteController@ManyToOny');//teste de relecionamentos
$this->get('one-to-many2', 'Painel\ClienteController@oneToManyTwo');//teste de relecionamentos
$this->get('one-to-many_insert', 'Painel\ClienteController@oneToManyTwoInsert');//teste de relecionamentos
$this->get('one-to-many_insert2', 'Painel\ClienteController@oneToManyTwoInsertwo');//teste de relecionamentos


$this->group(['middleware' => ['auth'], 'namespace' => 'Site'], function(){
    $this->get('/home', 'LTEController@index');
});

$this->get('/', 'Site\SiteController@index')->name('home');

$this->group(['namespace' => 'Site'], function(){
    Route::get('/site/categoria/{id}', 'SiteController@categoria');
    Route::get('/site/categoria2/{id?}', 'SiteController@categoriaOp');
    Route::get('/site/categoria/{id}', 'SiteController@categoria');
    Route::get('/site/categoria2/{id?}', 'SiteController@categoriaOp');
});

$this->group(['namespace' => 'Painel'], function(){
    Route::get('site/painel/produtos/tests', 'ProdutoController@tests');
    Route::resource('site/painel/produtos', 'ProdutoController');
    Route::resource('site/painel/cliente', 'ClienteController');
    Route::resource('site/painel/pedido', 'PedidoController');
    Route::resource('site/painel/criarpedido', 'PedidoController');
    Route::resource('site/painel/item', 'ItensPedidoController');
});


        Route::group(['namespace' => 'Site'], function () {


        });

        Auth::routes();

        //Route::get('/home', 'HomeController@index')->name('home');
