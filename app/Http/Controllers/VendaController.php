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
        return view('pages.venda.index',
        ['vendas' => $vendas]);
    }

    public function show($id)
    {

        // dd(Venda::find($id));
        return view(
            'pages.venda.single',
            ['venda' => Venda::find($id)]
        );
    }

    public function create()
    {
        return view('pages.venda.create');
    }

    public function store(Request $request)
    {
        $newVenda = $request->all();
        if (Venda::create($newVenda))
            return redirect('/vendas');
        else dd("Error ao criar venda!!");
    }

    public function edit($id)
    {
        return view('pages.venda.edit', ['venda' => Venda::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $upadateVenda = $request->all();
        // dd($upadateVenda);
        if (!venda::find($id)->update($upadateVenda))
            dd("Erro ao atualizar venda $id!");
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        return view(
            'pages.venda.delete',
            ['venda' => Venda::find($id)]
        );
    }

    public function remove(Request $request, $id)
    {
        //if(!Venda::find($id)->delete())
        if ($request->confirmar == 'Deletar')
            if (!Venda::destroy($id))
                dd("Error ao deletar venda $id.");
        return redirect('/dashboard');
    }
}
