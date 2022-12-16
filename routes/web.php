<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProfileController;
use App\Models\Cliente;
use App\Models\Estoque;
use App\Models\Venda;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing',['clientes' => Cliente::all()]);
})->name('landing');

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
            Route::get('/', 'index')->name('clientes')->middleware('auth');
            Route::get('/{id}', 'show')->name('single');
        });

        Route::prefix('/cliente')
            ->middleware('auth')
            ->group(function () {
                Route::get('/', 'create');
                Route::post('/', 'store');

                Route::get('/{id}/edit', 'edit')->name('cliente_edit');
                Route::post('/{id}/update', 'update')->name('cliente_update');

                Route::get('/{id}/delete', 'delete')->name('cliente_delete');
                Route::post('/{id}/remove', 'remove')->name('cliente_remove');
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

                Route::get('/{id}/edit', 'edit')->name('estoque_edit');
                Route::post('/{id}/update', 'update')->name('estoque_update');

                Route::get('/{id}/delete', 'delete')->name('estoque_delete');
                Route::post('/{id}/remove', 'remove')->name('estoque_remove');
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

                Route::get('/{id}/edit', 'edit')->name('venda_edit');
                Route::post('/{id}/update', 'update')->name('venda_update');

                Route::get('/{id}/delete', 'delete')->name('venda_delete');
                Route::post('/{id}/remove', 'remove')->name('venda_remove');
            });
});
