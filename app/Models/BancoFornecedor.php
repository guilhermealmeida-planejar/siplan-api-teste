<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BancoFornecedor extends Pivot
{
    protected $table = 'banco_fornecedor';
}
