<?php

namespace App\Http\Livewire;

use App\Models\Venda;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Vendas extends Component
{
    public $vendas;
    public $orderAsc=true;
    public $orderColumn = 'id';

    public $nome;
    public $descricao;
    public $valor;
    public $pagamento;

    public function render()
    {
        return view('livewire.vendas');
    }

    public function orderBy($column='id')
    {
        $this->orderColumn = $column;
        $this->vendas = Venda::orderBy(
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
        $venda= [
            "nome" => $this->nome,
            "descricao" => $this->descricao,
            "valor" => $this->valor,
            "pagamento" => $this->pagamento
        ];

        try{
            Venda::create($venda);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        }catch(Exception $e){
            dd('Erro ao inserir');
        }
    }

    private function clear(){
        $this->nome = '';
        $this->descricao = '';
        $this->valor = '';
        $this->pagamento = '';
    }

    public function remove($id){
        if (!Venda::destroy($id))
            return "Erro!";
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
    }
    public function update($id)
    {

        $venda= [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'pagamento' => $this->pagamento
        ];
        Venda::findOrFail($id)->update($venda);
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
        $this->clear();
    }
}
