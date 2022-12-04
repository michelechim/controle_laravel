<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('welcome'); });

Route::get('/ola',[HomeController::class,'index']);

/*Routes CLIENTE*/
Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/clientes/{id}',[ClienteController::class,'show']);

Route::get('/cliente',
    [ClienteController::class,'create']);
Route::post('/cliente',
    [ClienteController::class, 'store']);
Route::get('/cliente/{id}/edit',
    [ClienteController::class,'edit'])->name('edit');
Route::post('/cliente/{id}/update',
    [ClienteController::class,'update'])->name('update');
Route::get('/cliente/{id}/delete',
    [ClienteController::class,'delete'])->name('delete');
Route::post('/cliente/{id}/remove',
    [ClienteController::class,'remove'])->name('remove');

/*Routes ESTOQUE*/    
Route::get('/estoques',[EstoqueController::class,'index']);
Route::get('/estoques/{id}',[EstoqueController::class,'show']);

Route::get('/estoque',
    [EstoqueController::class,'create']);
Route::post('/estoque',
    [EstoqueController::class, 'store']);
Route::get('/estoque/{id}/edit',
    [EstoqueController::class,'edit'])->name('edit');
Route::post('/estoque/{id}/update',
    [EstoqueController::class,'update'])->name('update');
Route::get('/estoque/{id}/delete',
    [EstoqueController::class,'delete'])->name('delete');
Route::post('/estoque/{id}/remove',
    [EstoqueController::class,'remove'])->name('remove');

/*Routes VENDA*/
Route::get('/vendas',[VendaController::class,'index']);
Route::get('/vendas/{id}',[VendaController::class,'show']);

Route::get('/venda',
    [VendaController::class,'create']);
Route::post('/venda',
    [VendaController::class, 'store']);
Route::get('/venda/{id}/edit',
    [VendaController::class,'edit'])->name('edit');
Route::post('/venda/{id}/update',
    [VendaController::class,'update'])->name('update');
Route::get('/venda/{id}/delete',
    [VendaController::class,'delete'])->name('delete');
Route::post('/venda/{id}/remove',
    [VendaController::class,'remove'])->name('remove');