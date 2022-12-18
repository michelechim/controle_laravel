<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function index(){
        $modelVenda = new Venda();
        $vendas = $modelVenda->all();
        return view('pages.venda.index',
        ['vendas' => $vendas]);
    }

    public function show($id){
        return view(
            'pages.venda.single',
            ['venda' => Venda::find($id)]
        );
    }

    public function create(){
        return view('pages.venda.create');
    }

    public function store(Request $request){
        $newVenda = $request->all();
        if (Venda::create($newVenda))
            return redirect('/dashboard');
        else dd("Error ao criar vendas!!");
    }

    public function edit($id){
        return view('pages.venda.edit', ['venda' => Venda::find($id)]);
    }

    public function update(Request $request, $id){
        $updatedVenda = $request->all();
        if (!Venda::find($id)->update($updatedVenda))
            dd("Erro ao atualizar venda $id!");
        return redirect('/dashboard');
    }

    public function delete($id){
        return view(
            'pages.venda.delete',
            ['venda' => Venda::find($id)]
        );
    }

    public function remove(Request $request, $id){
        if ($request->confirmar == 'Deletar')
            if (!Venda::destroy($id))
                dd("Error ao deletar venda $id.");
        return redirect('/dashboard');
    }
}
