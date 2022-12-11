<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controller\EstoqueController;
use App\Http\Controller\VendaController;
use App\Http\Controllers\ProfileController;
use App\Models\Cliente;
use App\Models\Estoque;
use App\Models\Venda;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard',
        ['clientes'=>Cliente::all(),
         'users'=>User::all(),
         'estoques' =>Estoque::all(),
         'vendas' =>Venda::all(),
        ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/cliente/{id}', function ($id) {
    return view('pages.cliente.single-dash',['cliente'=>Cliente::find($id) ]);
})->middleware(['auth', 'verified'])->name('cliente.single-dash');

Route::get('/dashboard/estoque/{id}', function ($id) {
    return view('pages.estoque.single-dash',['estoque'=>Estoque::find($id) ]);
})->middleware(['auth', 'verified'])->name('estoque.single-dash');

Route::get('/dashboard/venda/{id}', function ($id) {
    return view('pages.venda.single-dash',['venda'=>Venda::find($id) ]);
})->middleware(['auth','verified'])->name('venda.single-dash');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(ClienteController::class)
    ->group(function () {
        Route::prefix('/clientes')->group(function () {
            Route::get('/', 'index')->name('clientes');
            Route::get('/{id}', 'show');
        });

        Route::prefix('/cliente')
            ->middleware('auth')
            ->group(function () {
                Route::get('/', 'create');
                Route::post('/', 'store');

                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/{id}/update', 'update')->name('update');

                Route::get('/{id}/delete', 'delete')->name('delete');
                Route::post('/{id}/remove', 'remove')->name('remove');
            });
    });

Route::controller(EstoqueController::class)
    ->group(function () {
        Route::prefix('/estoques')->group(function () {
            Route::get('/', 'index')->name('estoques');
            Route::get('/{id}', 'show');
        });

        Route::prefix('/estoque')
            ->middleware('auth')
            ->group(function () {
                Route::get('/', 'create');
                Route::post('/', 'store');

                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/{id}/update', 'update')->name('update');

                Route::get('/{id}/delete', 'delete')->name('delete');
                Route::post('/{id}/remove', 'remove')->name('remove');
            });
});

Route::controller(VendaController::class)
    ->group(function () {
        Route::prefix('/vendas')->group(function () {
            Route::get('/', 'index')->name('vendas');
            Route::get('/{id}', 'show');
        });

        Route::prefix('/venda')
            ->middleware('auth')
            ->group(function () {
                Route::get('/', 'create');
                Route::post('/', 'store');

                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/{id}/update', 'update')->name('update');

                Route::get('/{id}/delete', 'delete')->name('delete');
                Route::post('/{id}/remove', 'remove')->name('remove');
            });
});
