<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ApiPedidosController;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'IsAdmin'], function () {
//produto

Route::resource('/produto', ProdutosController::class);
Route::get('/search/produto/', [ProdutosController::class, 'search'])->name('search');

//lixeira Produto
Route::get('/lixeira/produto', [ProdutosController::class, 'lixeira'])->name('produto.lixeira');

//restaurar Produto
Route::patch('/produto/restaurar/{id}', [ProdutosController::class, 'restaurar'])->name('produto.restaurar');

//categoria

Route::resource('/categoria', CategoriasController::class);
Route::get('/search/categoria/', [CategoriasController::class, 'search4'])->name('search4');

//tipo

Route::resource('/tipo', TipoController::class);
Route::get('/search/tipo/', [TipoController::class, 'search5'])->name('search5');

//usuario
Route::get('/usuarios', [UsuarioController::class, 'usuarios'])->name('usuario.usuarios');
Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'editar'])->name('usuario.editar');
Route::patch('/usuario/updater/{id}', [UsuarioController::class, 'updater'])->name('usuario.updater');
Route::get('/search/usuario/', [UsuarioController::class, 'search2'])->name('search2');
Route::get('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

// todos pedidos 
Route::get('/pedido',[ApiPedidosController::class,'pedidos'])->name('pedido.pedidos');
Route::get('/search/pedido/', [ApiPedidosController::class, 'search3'])->name('search3');
Route::get('/pedido/edit/{id}', [ApiPedidosController::class, 'editarStatus'])->name('pedido.editarStatus');
Route::patch('/pedido/updater/{id}', [ApiPedidosController::class, 'updaterStatus'])->name('pedido.updaterStatus');
Route::get('/item/{id}',[ApiPedidosController::class,'item'])->name('pedido.item');

});


    

