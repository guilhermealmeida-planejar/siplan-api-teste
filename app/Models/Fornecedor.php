<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedor';

    public function banco()
    {
        return $this->belongsTo(Banco::class);
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
