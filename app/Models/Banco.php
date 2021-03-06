<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    protected $table = 'banco';
    protected $guarded = [];

    public function fornecedor()
    {
        return $this->hasMany(Fornecedor::class);
    }
}
