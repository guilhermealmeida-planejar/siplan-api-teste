<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BancoFornecedor extends Pivot
{

    use HasFactory;
    protected $table = 'banco_fornecedor';
}
