<?php

use App\Http\Controllers\Api\EstoqueController;
use App\Http\Controllers\Api\VendaController;
use App\Http\Controllers\Api\FornecedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('estoque',[EstoqueController::class,'index']);
Route::get('estoque/{id}',[EstoqueController::class,'show']);
Route::post('estoque',[EstoqueController::class,'store']);
Route::put('estoque/{id}',[EstoqueController::class,'update']);
Route::delete('estoque/{id}',[EstoqueController::class,'remove']);

Route::apiResource('fornecedor',FornecedorController::class);
Route::get('fornecedor/{fornecedor}/estoques',
        [FornecedorController::class,
        'estoques'
    ]);

Route::get('venda',[VendaController::class,'index']);
Route::get('venda/{id}',[VendaController::class,'show']);
Route::post('venda',[VendaController::class,'store']);
Route::put('venda/{id}',[VendaController::class,'update']);
Route::delete('venda/{id}',[VendaController::class,'remove']);

Route::apiResource('venda',VendaController::class);
