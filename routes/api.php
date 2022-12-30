<?php

use App\Http\Controllers\Api\EstoqueController;
use App\Http\Controllers\Api\VendaController;
use App\Http\Controllers\Api\FornecedorController;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
    return $request->user();
});

// estoque
Route::get('estoque',[EstoqueController::class,'index']);
Route::get('estoque/{id}',[EstoqueController::class,'show']);
Route::post('estoque',[EstoqueController::class,'store']);
Route::put('estoque/{id}',[EstoqueController::class,'update']);
Route::delete('estoque/{id}',[EstoqueController::class,'remove']);

// venda
Route::get('venda',[VendaController::class,'index']);
Route::get('venda/{id}',[VendaController::class,'show']);
Route::post('venda',[VendaController::class,'store']);
Route::put('venda/{id}',[VendaController::class,'update']);
Route::delete('venda/{id}',[VendaController::class,'remove']);


// user
Route::get('user',[UserController::class,'index']);
Route::get('user/{id}',[UserController::class,'show']);
Route::post('user',[UserController::class,'store']);
Route::put('user/{id}',[UserController::class,'update']);
Route::delete('user/{id}',[UserController::class,'remove']);


Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('fornecedores',FornecedorController::class)
    ->parameters([
        'fornecedores'=>'fornecedor'
    ]);
    Route::get('fornecedores/{fornecedor}/estoques',
        [FornecedorController::class,
        'estoques'
    ]);

    Route::put('/fornecedores/{fornecedor}',[FornecedorController::class,'update'])
        ->middleware('ability:is-admin');

        Route::apiResource('users',UserController::class);

});
Route::post('/login',[LoginController::class, 'login'])->name('login');

Route::apiResource('venda',VendaController::class)
    ->parameters([
        'vendas' => 'venda'
    ])->middleware('auth:sanctum');
