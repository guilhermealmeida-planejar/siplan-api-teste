<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedor';

    public function bancos()
    {
        return $this->belongsToMany(Banco::class)->using(BancoFornecedor::class);
    }
}
