<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function index()
    {
        $modelEstoque = new Estoque();
        $estoques = $modelEstoque->all();
        return view('estoques',['estoques'=>$estoques]);
    }

    public function show($id)
    {
        //dd(Produto::find($id));
        return view('estoque_single',
        ['estoque'=>Estoque::find($id)]);
    }

    public function create(){
        return view('estoque_create');
    }

    public function store(Request $request)
    {
        $newEstoque = $request->all();
        if (Estoque::create($newEstoque))
            return redirect('/estoques');
        else dd("Error ao criar estoque!!");
    }
    
    public function edit($id){
        return view('estoque_edit',['estoque' => Estoque::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedEstoque = $request->all();
        if (!Estoque::find($id)->update($updatedEstoque))
            dd("Erro ao atualizar estoque $id!");
        return redirect('/estoques');
    }

    public function delete($id){
        return view('/estoque_delete',['estoque' => Estoque::find($id)]);
    }

    public function remove(Request $request, $id){
        if($request->confirmar == 'Deletar')
            if(!Estoque::destroy($id))
                dd("Erro ao deletar estoque $id.");
        return redirect('/estoques');
    }
}