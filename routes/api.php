<?php

use App\Http\Controllers\Api\EstoqueController;
use App\Http\Controllers\Api\VendaController;
use App\Http\Controllers\Api\FornecedorController;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

// estoque
// Route::get('estoque',[EstoqueController::class,'index']);
// Route::get('estoque/{id}',[EstoqueController::class,'show']);
// Route::post('estoque',[EstoqueController::class,'store']);
// Route::put('estoque/{id}',[EstoqueController::class,'update']);
// Route::delete('estoque/{id}',[EstoqueController::class,'remove']);

// venda
// Route::get('venda',[VendaController::class,'index']);
// Route::get('venda/{id}',[VendaController::class,'show']);
// Route::post('venda',[VendaController::class,'store']);
// Route::put('venda/{id}',[VendaController::class,'update']);
// Route::delete('venda/{id}',[VendaController::class,'remove']);

// user
// Route::get('user',[UserController::class,'index']);
// Route::get('user/{id}',[UserController::class,'show']);
// Route::post('user',[UserController::class,'store']);
// Route::put('user/{id}',[UserController::class,'update']);
// Route::delete('user/{id}',[UserController::class,'remove']);

Route::middleware('auth:sanctum')->group(function(){

    //fornecedor
    Route::apiResource('fornecedores',FornecedorController::class)->parameters(['fornecedores'=>'fornecedor']);
    Route::get('fornecedores/{fornecedor}/estoques',[FornecedorController::class,'fornecedores']);
    Route::get('/fornecedores/{fornecedor}', [FornecedorController::class,'show']);
    Route::post('/fornececedor',[FornecedorController::class,'store'])
        ->middleware('ability:is_admin');
    Route::put('/fornecedores/{fornecedor}',[FornecedorController::class,'update'])
        ->middleware('ability:is_admin');
    Route::delete('/fornecedor/{fornecedor}',[FornecedorController::class,'destroy'])
        ->middleware('ability:is_admin');

    //estoque
    Route::apiResource('/estoques', EstoqueController::class)->parameters(['estoques'=>'estoque']);
    Route::get('/estoques/{estoque}/estoque', [EstoqueController::class,'estoques']);
    Route::get('/estoques/{estoque}', [EstoqueController::class,'show']);
    Route::post('/estoques',[EstoqueController::class,'store'])
        ->middleware('ability:is_admin');
    Route::put('/estoques/{estoque}', [EstoqueController::class,'update'])
        ->middleware('ability:is_admin');
    Route::delete('/estoques/{estoques}',[EstoqueControlle::class,'destroy'])
        ->middleware('ability:is_admin');

    //venda
    Route::apiResource('/vendas',VendaController::class)->parameters(['vendas'=>'venda']);
    Route::get('vendas/{venda}/vendas',[VendaController::class,'vendas']);
    Route::get('vendas/{venda}',[VendaController::class,'show']);
    Route::post('/vendas',[VendaController::class,'store'])
        ->middleware('ability:is_admin');
    Route::put('/vendas/{venda}',[VendaController::class,'update'])
        ->middleware('ability:is_admin');
    Route::delete('/vendas/{vendas}',[VendaController::class,'destroy'])
        ->middleware('ability:is_admin');

    //user
    Route::apiResource('users',UserController::class);
    Route::get('/users/{user}/users',[UserController::class,'users']);
    Route::get('/user/{user}',[UserController::class,'show']);
    Route::post('/user',[UserController::class,'store'])
        ->middleware('ability:is_admin');
    Route::put('/user/{user}',[UserController::class,'update'])
        ->middleware('ability:is_admin');
    Route::delete('/user/{users}', [UserController::class,'destroy'])
        ->middleware('ability:is_admin');

});
Route::post('/login',[LoginController::class, 'login'])->name('login');
