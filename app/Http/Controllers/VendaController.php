<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function index()
    {
        $modelVenda = new Venda();
        $vendas = $modelVenda->all();
        return view('vendas',['vendas'=>$vendas]);
    }

    public function show($id)
    {
        //dd(Produto::find($id));
        return view('venda_single',
        ['venda'=>Venda::find($id)]);
    }

    public function create(){
        return view('venda_create');
    }

    public function store(Request $request)
    {
        $newVenda = $request->all();
        if (Venda::create($newVenda))
            return redirect('/vendas');
        else dd("Error ao criar venda!!");
    }
    
    public function edit($id){
        return view('venda_edit',['venda' => Venda::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedVenda = $request->all();
        if (!Venda::find($id)->update($updatedVenda))
            dd("Erro ao atualizar venda $id!");
        return redirect('/vendas');
    }

    public function delete($id){
        return view('/venda_delete',['venda' => Venda::find($id)]);
    }

    public function remove(Request $request, $id){
        if($request->confirmar == 'Deletar')
            if(!Venda::destroy($id))
                dd("Erro ao deletar venda $id.");
        return redirect('/vendas');
    }
}