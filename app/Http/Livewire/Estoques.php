<?php

namespace App\Http\Livewire;

use App\Models\Estoque;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Estoques extends Component
{
    public $estoques;
    public $orderAsc=true;
    public $orderColumn = 'id';

    public $descricao;
    public $validade;
    public $qtd_estoque;
    public $custo;
    public $venda;


    public function render(){
        return view('livewire.estoques');
    }

    public function orderBy($column='id')   {
        $this->orderColumn = $column;
        $this->estoques = Estoque::orderBy(
            $this->orderColumn,
            $this->orderAsc ? 'asc' : 'desc'
        )->get();
        $this->orderAsc = !$this->orderAsc;
        //debugando variavel na saida do servidor
        Log::channel('stderr')->info($this->orderAsc?'asc':'desc');
    }

    public function orderByName(){
        $this->orderBy('descricao');
    }

    public function save(){
        $estoque = [
            "descricao" => $this->descricao,
            "validade" => $this->validade,
            "qtd_estoque" => $this->qtd_estoque,
            "custo" => $this->custo,
            "venda" => $this->venda
        ];

        try{
            Estoque::create($estoque);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        }catch(Exception $e){
            dd('Erro ao inserir');
        }
    }

    private function clear(){
        $this->descricao = '';
        $this->validade = '';
        $this->qtd_estoque = '';
        $this->custo = '';
        $this->venda = '';
    }

    public function remove($id){
        if (!Estoque::destroy($id))
            return "Erro!";
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
    }
    public function update($id)
    {

        $estoque= [
            'descricao' => $this->descricao,
            'validade' => $this->validade,
            'qtd_estoque' => $this->qtd_estoque,
            'custo' => $this->custo,
            'venda' => $this->venda
        ];
        Estoque::findOrFail($id)->update($estoque);
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
        $this->clear();
    }
}
