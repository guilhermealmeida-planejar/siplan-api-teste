<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    protected $table = 'banco';

    public function fornecedor()
    {
        return $this->belongsToMany(Fornecedor::class)->using(BancoFornecedor::class);
    }
}
