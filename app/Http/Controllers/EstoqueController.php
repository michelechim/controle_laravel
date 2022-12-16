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
        return view('pages.estoque.index',
        ['estoques' => $estoques]);
    }

    public function show($id)
    {

        // dd(Estoque::find($id));
        return view(
            'pages.estoque.single',
            ['estoque' => Estoque::find($id)]
        );
    }

    public function create()
    {
        return view('pages.estoque.create');
    }

    public function store(Request $request)
    {
        $newEstoque = $request->all();
        if (Estoque::create($newEstoque))
            return redirect('/dashboard');
        else dd("Error ao criar estoque!!");
    }

    public function edit($id)
    {
        return view('pages.estoque.edit', ['estoque' => Estoque::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedEstoque = $request->all();
        if (!Estoque::find($id)->update($updatedEstoque))
            dd("Erro ao atualizar estoque $id!");
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        return view(
            'pages.estoque.delete',
            ['estoque' => Estoque::find($id)]
        );
    }

    public function remove(Request $request, $id)
    {
        if ($request->confirmar == 'Deletar')
            if (!Estoque::destroy($id))
                dd("Error ao deletar estoque $id.");
        return redirect('/dashboard');
    }
}
