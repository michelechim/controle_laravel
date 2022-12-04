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
        return view('clientes',['clientes'=>$clientes]);
    }

    public function show($id)
    {
        //dd(Produto::find($id));
        return view('cliente_single',
        ['cliente'=>Cliente::find($id)]);
    }

    public function create(){
        return view('cliente_create');
    }

    public function store(Request $request)
    {
        $newCliente = $request->all();
        // $newCliente['importado'] = ($request->importado) ? true : false;
        if (Cliente::create($newCliente))
            return redirect('/clientes');
        else dd("Error ao criar cliente!!");
    }
    
    public function edit($id){
        return view('cliente_edit',['cliente' => Cliente::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedCliente = $request->all();
        //dd($updatedCliente);
        if (!Cliente::find($id)->update($updatedCliente))
            dd("Erro ao atualizar cliente $id!");
        return redirect('/clientes');
    }

    public function delete($id){
        return view('/cliente_delete',['cliente' => Cliente::find($id)]);
    }

    public function remove(Request $request, $id){
        if($request->confirmar == 'Deletar')
            if(!Cliente::destroy($id))
                dd("Erro ao deletar cliente $id.");
        return redirect('/clientes');
    }
}