<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $modelCliente = new Cliente();
        $clientes = $modelCliente->all();
        return view('pages.cliente.index',
        ['clientes' => $clientes]);
    }

    public function show($id)
    {

        // dd(Cliente::find($id));
        return view(
            'pages.cliente.single',
            ['cliente' => Cliente::find($id)]
        );
    }

    public function create()
    {
        return view('pages.cliente.create');
    }

    public function store(Request $request)
    {
        $newCliente = $request->all();
        if (Cliente::create($newCliente))
            return redirect('/clientes');
        else dd("Error ao criar cliente!!");
    }

    public function edit($id)
    {
        return view('pages.cliente.edit', ['cliente' => Cliente::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedCliente = $request->all();
        // dd($updatedCliente);
        if (!Cliente::find($id)->update($updatedCliente))
            dd("Erro ao atualizar cliente $id!");
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        return view(
            'pages.cliente.delete',
            ['cliente' => Cliente::find($id)]
        );
    }

    public function remove(Request $request, $id)
    {
        //if(!Cliente::find($id)->delete())
        if ($request->confirmar == 'Deletar')
            if (!Cliente::destroy($id))
                dd("Error ao deletar cliente $id.");
        return redirect('/dashboard');
    }
}
