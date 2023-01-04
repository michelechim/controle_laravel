<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        $modelFornecedor = new Fornecedor();
        $fornecedores = $modelFornecedor->all();
        return view('pages.fornecedor.index',
        ['fornecedores' => $fornecedores]);
    }

    public function show($id)
    {
        return view(
            'pages.fornecedor.single',
            ['fornecedor' => Fornecedor::find($id)]
        );
    }

    public function create()
    {
        return view('pages.fornecedor.create');
    }

    public function store(Request $request)
    {
        $newFornecedor = $request->all();
        if (Fornecedor::create($newFornecedor))
            return redirect('/dashboard');
        else dd("Error ao criar fornecedor!!");
    }

    public function edit($id)
    {
        return view('pages.fornecedor.edit', ['fornecedor' => Fornecedor::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedFornecedor = $request->all();
        if (!Fornecedor::find($id)->update($updatedFornecedor))
            dd("Erro ao atualizar fornecedor $id!");
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        return view(
            'pages.fornecedor.delete',
            ['fornecedor' => Fornecedor::find($id)]
        );
    }

    public function remove(Request $request, $id)
    {
        if ($request->confirmar == 'Deletar')
            if (!Fornecedor::destroy($id))
                dd("Error ao deletar fornecedor $id.");
        return redirect('/dashboard');
    }
}
