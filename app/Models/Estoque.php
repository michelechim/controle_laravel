<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory, \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = [
        "descricao",
        "qtd_estoque",
        "validade",
        "custo",
        "venda",
        "fornecedor_id"
    ];

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }

    public function regiao(){
        return $this->belongsToThrough(
            Regiao::class,
            [
                Estado::class,
                Fornecedor::class
            ],
            null,
            '',
            [
                Regiao::class=>'regiao_id',
                Fornecedor::class=>'fornecedor_id'
            ]
        );
    }
}
