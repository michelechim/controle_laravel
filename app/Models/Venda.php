<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory, \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = [
        "nome",
        "descricao",
        "valor",
        "pagamento"
    ];

    public function venda(){
        return $this->belongsTo(Venda::class);
    }

}
