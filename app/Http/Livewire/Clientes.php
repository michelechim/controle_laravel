<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Clientes extends Component
{
    public $clientes;
    public $orderAsc=true;
    public $orderColumn = 'id';

    public $nome;
    public $telefone;
    public $endereco;


    public function render()
    {
        return view('livewire.clientes');
    }

    public function orderBy($column='id')
    {
        $this->orderColumn = $column;
        $this->clientes = Cliente::orderBy(
            $this->orderColumn,
            $this->orderAsc ? 'asc' : 'desc'
        )->get();
        $this->orderAsc = !$this->orderAsc;
        //debugando variavel na saida do servidor
        Log::channel('stderr')->info($this->orderAsc?'asc':'desc');
    }

    public function orderByName(){
        $this->orderBy('nome');
    }

    public function save()
    {
        $cliente = [
            "nome" => $this->nome,
            "telefone" => $this->telefone,
            "endereco" => $this->endereco,
        ];

        try{
            Cliente::create($cliente);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        }catch(Exception $e){
            dd('Erro ao inserir');
        }
    }

    private function clear(){
        $this->nome = '';
        $this->telefone = '';
        $this->endereco = '';
    }

    public function remove($id){
        if (!Cliente::destroy($id))
            return "Erro!";
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
    }
    public function update($id)
    {

        $cliente= [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
        ];
        Cliente::findOrFail($id)->update($cliente);
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
        $this->clear();
    }
}
